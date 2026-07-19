<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Book;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Attendance::with(['student', 'book']);

        if ($request->has('tanggal_dari') && $request->tanggal_dari) {
            $query->whereDate('tanggal', '>=', $request->tanggal_dari);
        }

        if ($request->has('tanggal_sampai') && $request->tanggal_sampai) {
            $query->whereDate('tanggal', '<=', $request->tanggal_sampai);
        }

        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }

        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->whereHas('student', function ($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nis', 'like', "%{$search}%");
            });
        }

        $attendances = $query->latest()->paginate(15);

        return view('attendances.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::tersedia()->get();
        return view('attendances.create', compact('books'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|exists:students,nis',
            'book_id' => 'nullable|exists:books,id',
            'catatan' => 'nullable|string',
        ]);

        $student = Student::where('nis', $validated['nis'])->firstOrFail();

        // Cek apakah siswa masih ada yang aktif hari ini
        $activeAttendance = Attendance::where('student_id', $student->id)
            ->whereDate('tanggal', today())
            ->where('status', 'aktif')
            ->first();

        if ($activeAttendance) {
            return back()->with('error', 'Siswa masih memiliki kunjungan aktif hari ini. Silakan checkout terlebih dahulu.');
        }

        Attendance::create([
            'student_id' => $student->id,
            'book_id' => $validated['book_id'] ?? null,
            'tanggal' => today(),
            'waktu_masuk' => now()->format('H:i:s'),
            'status' => 'aktif',
            'catatan' => $validated['catatan'] ?? null,
        ]);

        return redirect()->route('attendances.index')
            ->with('success', 'Absensi berhasil dicatat. Selamat membaca!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        $attendance->load(['student', 'book']);
        return view('attendances.show', compact('attendance'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        $books = Book::all();
        $students = Student::active()->get();
        return view('attendances.edit', compact('attendance', 'books', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'book_id' => 'nullable|exists:books,id',
            'tanggal' => 'required|date',
            'waktu_masuk' => 'required|date_format:H:i',
            'waktu_keluar' => 'nullable|date_format:H:i|after:waktu_masuk',
            'status' => 'required|in:aktif,selesai',
            'catatan' => 'nullable|string',
        ]);

        $attendance->update($validated);

        return redirect()->route('attendances.index')
            ->with('success', 'Data absensi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect()->route('attendances.index')
            ->with('success', 'Data absensi berhasil dihapus.');
    }

    /**
     * Checkout attendance
     */
    public function checkout(Attendance $attendance)
    {
        if ($attendance->status === 'selesai') {
            return back()->with('error', 'Absensi sudah selesai.');
        }

        $attendance->update([
            'waktu_keluar' => now()->format('H:i:s'),
            'status' => 'selesai',
        ]);

        return back()->with('success', 'Checkout berhasil. Terima kasih sudah berkunjung!');
    }

    /**
     * Monitoring page
     */
    public function monitoring()
    {
        $activeVisitors = Attendance::with(['student', 'book'])
            ->aktif()
            ->whereDate('tanggal', today())
            ->get();

        $todayStats = [
            'total' => Attendance::whereDate('tanggal', today())->count(),
            'aktif' => Attendance::aktif()->whereDate('tanggal', today())->count(),
            'selesai' => Attendance::where('status', 'selesai')->whereDate('tanggal', today())->count(),
        ];

        return view('attendances.monitoring', compact('activeVisitors', 'todayStats'));
    }
}
