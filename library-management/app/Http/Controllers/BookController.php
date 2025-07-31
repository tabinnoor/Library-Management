<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(Request $request)
{
    $query = Book::query();

    if ($request->has('search') && !empty($request->search)) {
        $searchTerm = $request->search;
        $query->where('title', 'like', '%' . $searchTerm . '%');
    }

    $books = $query->get();

    return view('books.index', compact('books'));
}


    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|integer|min:1500|max:' . date('Y'),
            'quantity' => 'required|integer|min:0',
        ]);

        Book::create($request->only(['title', 'author', 'year', 'quantity']));

        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|integer|min:1500|max:' . date('Y'),
            'quantity' => 'required|integer|min:0',
        ]);

        $book->update($request->only(['title', 'author', 'year', 'quantity']));

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted.');
    }
}
