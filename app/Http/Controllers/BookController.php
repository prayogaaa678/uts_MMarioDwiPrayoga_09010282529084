<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function index(Request $request): View
    {
        $books = Book::with('category')
            ->search($request->query('q'))
            ->ofCategory($request->query('category'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('books.index', [
            'books'      => $books,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function create(): View
    {
        return view('books.create', [
            'book'       => new Book(),
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function store(BookRequest $request): RedirectResponse
    {
        Book::create($request->validated());

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    public function show(Book $book): View
    {
        $book->load('category');

        return view('books.show', compact('book'));
    }

    public function edit(Book $book): View
    {
        return view('books.edit', [
            'book'       => $book,
            'categories' => Category::orderBy('name')->get(),
        ]);
    }

    public function update(BookRequest $request, Book $book): RedirectResponse
    {
        $book->update($request->validated());

        return redirect()->route('books.index')
            ->with('success', 'Perubahan buku berhasil disimpan.');
    }

    public function destroy(Book $book): RedirectResponse
    {
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
