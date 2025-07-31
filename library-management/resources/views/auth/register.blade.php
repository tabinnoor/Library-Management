@extends('layouts.app')

@section('title', 'Register - Library Management')

@section('content')
<div style="max-width: 400px; margin: 40px auto; background: white; padding: 30px; border-radius: 6px; box-shadow: 0 0 15px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; margin-bottom: 20px;">Register</h2>

    @if ($errors->any())
        <div style="color: #e74c3c; margin-bottom: 15px;">
            <ul style="padding-left: 20px; margin: 0;">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div style="color: #27ae60; margin-bottom: 15px;">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required
               style="width: 100%; padding: 10px; margin: 6px 0 15px 0; border: 1px solid #ccc; border-radius: 4px;">

        <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required
               style="width: 100%; padding: 10px; margin: 6px 0 15px 0; border: 1px solid #ccc; border-radius: 4px;">

        <input type="password" name="password" placeholder="Password" required
               style="width: 100%; padding: 10px; margin: 6px 0 15px 0; border: 1px solid #ccc; border-radius: 4px;">

        <input type="password" name="password_confirmation" placeholder="Confirm Password" required
               style="width: 100%; padding: 10px; margin: 6px 0 15px 0; border: 1px solid #ccc; border-radius: 4px;">

        <button type="submit" 
                style="width: 100%; padding: 10px; background: #27ae60; border: none; color: white; font-weight: bold; cursor: pointer; border-radius: 4px;">
            Register
        </button>
    </form>

    <p style="text-align:center; margin-top: 15px;">
        Already have an account? <a href="{{ route('login') }}">Login here</a>.
    </p>
</div>
@endsection
