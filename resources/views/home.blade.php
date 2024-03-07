@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-cover bg-center flex items-center justify-center">
        <div class="container mx-auto flex justify-center">
            @guest
                <div class="text-black text-center">
                    <h1 class="text-4xl font-bold mb-4">Welcome to Your Website</h1>
                    <p class="text-lg mb-8">Join us to explore our services and connect with our doctors.</p>
                    <div class="flex items-center justify-center">
                        <a href="{{ route('login') }}" class="bg-blue-500 text-white py-2 px-4 rounded mr-4">Login</a>
                        <a href="{{ route('register') }}" class="bg-green-500 text-white py-2 px-4 rounded">Register</a>
                    </div>
                </div>
            @endguest
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endpush
@endsection
