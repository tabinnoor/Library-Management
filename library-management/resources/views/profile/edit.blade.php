@extends('layouts.app')

@section('content')
<div class="container mt-4" style="max-width: 600px;">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">👤 Edit Profile</h4>
        </div>
        <div class="card-body">

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="mb-3">
                    <label class="form-label" for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control"
                           value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control"
                           value="{{ old('email', $user->email) }}" required>
                </div>

                <hr>

                <h6 class="text-secondary">🔐 Change Password <small class="text-muted">(optional)</small></h6>

                <div class="mb-3">
                    <label class="form-label" for="password">New Password</label>
                    <input type="password" name="password" id="password" class="form-control"
                           placeholder="Leave blank to keep current password">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password_confirmation">Confirm New Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="form-control" placeholder="Repeat new password">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">⬅ Cancel</a>
                    <button type="submit" class="btn btn-primary">💾 Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
