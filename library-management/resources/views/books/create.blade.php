@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-width: 600px;">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Add New Book</h4>
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

            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Book Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Author Name</label>
                    <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}" required>
                </div>

                <div class="mb-3">
                    <label for="year" class="form-label">Publishing Year</label>
                    <input type="number" name="year" id="year" class="form-control" value="{{ old('year') }}" required min="1500" max="{{ date('Y') }}">
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}" required min="0">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">⬅ Back</a>
                    <button type="submit" class="btn btn-success">💾 Save Book</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
