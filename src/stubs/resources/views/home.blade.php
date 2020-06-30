@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center mt-16 mx-6">
    <div class="p-6 bg-white shadow rounded-md">
        <h3 class="text-gray-700 text-lg">{{ __('Dashboard') }}</h3>


        @if (session('status'))
            <div class="w-full bg-green-500 text-white">
                <div class="container mx-auto py-4 px-6">
                    <div class="flex">
                        <svg viewBox="0 0 40 40" class="h-6 w-6 fill-current">
                            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM16.6667 28.3333L8.33337 20L10.6834 17.65L16.6667 23.6166L29.3167 10.9666L31.6667 13.3333L16.6667 28.3333Z"></path>
                        </svg>

                        <p class="mx-3">{{ session('status') }}</p>
                    </div>
                </div>
            </div>
        @endif
        
        <p class="text-gray-600 mt-3">{{ __('You are logged in!') }}</p>
    </div>
</div>
@endsection
