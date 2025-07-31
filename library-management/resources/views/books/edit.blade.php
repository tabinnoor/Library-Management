@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-width: 600px;">
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">✏️ Edit Book</h4>
        </div>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('books.update', $book) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Book Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $book->title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author Name</label>
                    <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $book->author) }}" required>
                </div>

                <div class="mb-3">
                    <label for="year" class="form-label">Publishing Year</label>
                    <input type="number" name="year" id="year" class="form-control" value="{{ old('year', $book->year) }}" required min="1500" max="{{ date('Y') }}">
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $book->quantity) }}" required min="0">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">⬅ Cancel</a>
                    <button type="submit" class="btn btn-primary">💾 Update Book</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
