<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="h-screen bg-gray-100 font-nunito">
    <div id="app">
        <nav class="bg-white shadow-sm">
            <div class="container flex justify-between items-center mx-auto px-6 py-4">
                <div>
                    <a href="{{ url('/') }}" class="text-xl text-gray-800">{{ config('app.name', 'Laravel') }}</a>
                </div>

                <div>
                    @guest
                        <a href="{{ route('login') }}" class="text-gray-700 font-light mx-4 hover:underline">{{ __('Login') }}</a>
                        <a href="{{ route('register') }}" class="text-gray-700 font-light hover:underline">{{ __('Register') }}</a>
                    @else
                        <div  class="relative">
                            <button @click="dropdownOpen = !dropdownOpen" class="relative z-10 block text-gray-700 font-light focus:outline-none">
                                {{ Auth::user()->name }}
                            </button>

                            <div v-if="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"></div>

                            <div v-if="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                                <a href="{{ route('logout') }}"  class="block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-white" 
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </div>
                        </div>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endguest
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
