<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class BookController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode_buku', 'like', "%{$search}%")
                  ->orWhere('judul', 'like', "%{$search}%")
                  ->orWhere('pengarang', 'like', "%{$search}%")
                  ->orWhere('kategori', 'like', "%{$search}%");
            });
        }

        if ($request->has('kategori') && $request->kategori) {
            $query->where('kategori', $request->kategori);
        }

        $books = $query->latest()->paginate(10);

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('manage-books');
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('manage-books');
        
        $validated = $request->validate([
            'kode_buku' => 'required|unique:books,kode_buku|max:50',
            'judul' => 'required|max:255',
            'pengarang' => 'nullable|max:255',
            'penerbit' => 'nullable|max:255',
            'tahun_terbit' => 'nullable|integer|min:1900|max:' . date('Y'),
            'kategori' => 'nullable|max:100',
            'jumlah_halaman' => 'nullable|integer|min:1',
            'status' => 'required|in:tersedia,tidak_tersedia',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Data buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        $attendances = $book->attendances()
            ->with('student')
            ->latest()
            ->paginate(10);

        return view('books.show', compact('book', 'attendances'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $this->authorize('manage-books');
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $this->authorize('manage-books');
        
        $validated = $request->validate([
            'kode_buku' => 'required|max:50|unique:books,kode_buku,' . $book->id,
            'judul' => 'required|max:255',
            'pengarang' => 'nullable|max:255',
            'penerbit' => 'nullable|max:255',
            'tahun_terbit' => 'nullable|integer|min:1900|max:' . date('Y'),
            'kategori' => 'nullable|max:100',
            'jumlah_halaman' => 'nullable|integer|min:1',
            'status' => 'required|in:tersedia,tidak_tersedia',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')
            ->with('success', 'Data buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $this->authorize('manage-books');
        
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Data buku berhasil dihapus.');
    }
}
