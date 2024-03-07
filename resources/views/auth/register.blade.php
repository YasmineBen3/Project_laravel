@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center">
    <div class="w-1/3 bg-white p-8 rounded shadow-md">
        <h1 class="text-2xl font-bold mb-6">Register</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                <input id="name" type="text" class="border rounded w-full py-2 px-3" name="name" value="{{ old('name') }}" required autofocus>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input id="email" type="email" class="border rounded w-full py-2 px-3" name="email" value="{{ old('email') }}" required>
            </div>

            <div class="mb-4">
                <label for="dob" class="block text-gray-700 text-sm font-bold mb-2">Date of Birth</label>
                <input id="dob" type="date" class="border rounded w-full py-2 px-3" name="dob" required>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input id="password" type="password" class="border rounded w-full py-2 px-3" name="password" required>
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
                <input id="password_confirmation" type="password" class="border rounded w-full py-2 px-3" name="password_confirmation" required>
            </div>

            <div class="mb-4">
                <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Role</label>
                <select id="role" class="border rounded w-full py-2 px-3" name="role" required>
                    <option value="patient">Patient</option>
                    <option value="doctor">Doctor</option>
                </select>
            </div>

            <div class="mb-6">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                    Register
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
