<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
    <div id="app">
        <nav class="bg-white shadow">
            <div class="container mx-auto">
                <div class="flex items-center justify-between py-4">
                    <a class="text-2xl font-bold" href="{{ url('/') }}">
                        {{ config('app.name', 'doctor') }}
                    </a>

                    <div class="space-x-4">
                        <!-- <x-navbar /> -->

                        <div class="flex items-center space-x-4">
                            @guest
                                @if (Route::has('login'))
                                    <a class="text-blue-500" href="{{ route('login') }}">{{ __('Login') }}</a>
                                @endif

                                @if (Route::has('register'))
                                    <a class="text-green-500" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            @else
                            <div class="relative">
                                    <button id="navbarDropdown" class="text-gray-700 focus:outline-none">
                                        {{ Auth::user()->name }}
                                    </button>
                                <div class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg hidden">
                                    @if(Auth::user()->Doctor())
                                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-white" href="{{ route('doctors.index') }}" >
                                            {{ __('Doctors') }}
                                        </a>
                                    @elseif(Auth::user()->Patient())
                                        <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-white" href="{{ route('patients.index') }}">
                                            {{ __('Patients') }}
                                        </a>
                                    @endif

                                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                        @csrf
                                    </form>
                                </div>

                            </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
