@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-width: 600px;">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">📘 Book Details</h4>
        </div>
        <div class="card-body">
            <p><strong>📖 Title:</strong> {{ $book->title }}</p>
            <p><strong>✍️ Author:</strong> {{ $book->author }}</p>
            <p><strong>📅 Year:</strong> {{ $book->year }}</p>
            <p><strong>📦 Quantity:</strong> {{ $book->quantity }}</p>

            <a href="{{ route('books.index') }}" class="btn btn-outline-primary mt-3">⬅ Back to List</a>
        </div>
    </div>
</div>
@endsection
