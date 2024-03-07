@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8">
    <div class="flex">
      
        <div class="w-1/4 pr-4">
            <div class="bg-gray-200 p-4">
                <a href="{{ route('dashboard') }}" class="block py-2 px-4 text-blue-500 border-b border-blue-500">Dashboard</a>
            </div>
        </div>
        <div class="w-3/4 pl-4">
            <div class="bg-white rounded shadow p-6">
                <h1 class="text-2xl font-bold mb-4">{{ __('Dashboard') }}</h1>

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if(Auth::user())
                    <p class="text-lg">Welcome, {{ Auth::user()->name }}!</p>
                    <p>You are logged in.</p>
                @else
                    <p>You are not logged in.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
