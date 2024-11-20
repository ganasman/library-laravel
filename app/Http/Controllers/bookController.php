<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('books.index', ['books' => book::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required|string|max:255',
                'penulis' => 'required|string|max:255',
                'stok' => 'required|integer|min:0',
                'terbit' => 'required|string|max:4', // Assuming year is a string, you could also use 'integer'
                'kategori' => 'required|string',
                'status' => 'required|string',
                'deskripsi' => 'required|string',
            ]);
            
            book::create($request->all());
            return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, book $book)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
            'terbit' => 'required|integer|max:4', // Assuming year is a string
            'kategori' => 'required|string',
            'status' => 'required|boolean', // Use boolean for status field
            'deskripsi' => 'required|string',
        ]);
    
        // Update the book's details
        $book->update([
            'judul' => $request->input('judul'),
            'penulis' => $request->input('penulis'),
            'stok' => $request->input('stok'),
            'terbit' => $request->input('terbit'),
            'kategori' => $request->input('kategori'),
            'status' => $request->input('status'),
            'deskripsi' => $request->input('deskripsi'),
        ]);
    
        // Redirect with a success message
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}
