@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">📚 All Books</h2>

    <form action="{{ route('books.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by title..." value="{{ request('search') }}">
            <button class="btn btn-outline-primary">Search</button>
        </div>
    </form>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">➕ Add New Book</a>

    <table class="table table-striped">
        <thead class="table-dark">
            <tr>
                <th>📖 Title</th>
                <th>✍️ Author</th>
                <th>📅 Year</th>
                <th>📦 Quantity</th>
                <th>⚙️ Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->year }}</td>
                    <td>{{ $book->quantity }}</td>
                    <td>
                        <a href="{{ route('books.show', $book) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline" data-confirm="Are you sure?">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">No books found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
