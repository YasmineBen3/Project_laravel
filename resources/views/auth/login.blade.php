@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="w-1/3 bg-white p-8 rounded shadow-md">
        <h1 class="text-2xl font-bold mb-6">Login</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input id="email" type="email" class="border rounded w-full py-2 px-3" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input id="password" type="password" class="border rounded w-full py-2 px-3" name="password" required autocomplete="current-password">
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                    Login
                </button>
            </div>

            @if (Route::has('password.request'))
                <a class="text-blue-500 hover:text-blue-700" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
            @endif
        </form>
    </div>
</div>
@endsection
