<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class StudentController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nis', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%")
                    ->orWhere('kelas', 'like', "%{$search}%");
            });
        }

        $students = $query->latest()->paginate(10);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('manage-students');
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('manage-students');

        $validated = $request->validate([
            'nis' => 'required|unique:students,nis|max:20',
            'nama' => 'required|max:255',
            'kelas' => 'required|max:50',
            'jurusan' => 'nullable|max:50',
            'alamat' => 'nullable',
            'no_telp' => 'nullable|max:20',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $attendances = $student->attendances()
            ->with('book')
            ->latest()
            ->paginate(10);

        return view('students.show', compact('student', 'attendances'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $this->authorize('manage-students');
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $this->authorize('manage-students');

        $validated = $request->validate([
            'nis' => 'required|max:20|unique:students,nis,' . $student->id,
            'nama' => 'required|max:255',
            'kelas' => 'required|max:50',
            'jurusan' => 'nullable|max:50',
            'alamat' => 'nullable',
            'no_telp' => 'nullable|max:20',
            'status' => 'required|in:aktif,tidak_aktif',
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $this->authorize('manage-students');

        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }

    /**
     * Check NIS exists
     */
    public function checkNis($nis)
    {
        $student = Student::where('nis', $nis)->first();

        if ($student) {
            return response()->json([
                'found' => true,
                'student' => $student
            ]);
        }

        return response()->json(['found' => false]);
    }
}
