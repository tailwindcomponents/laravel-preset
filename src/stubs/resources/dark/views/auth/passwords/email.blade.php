@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center mt-16 mx-6">
    <div class="p-6 max-w-sm w-full bg-gray-800 shadow rounded-md">
        <h3 class="text-white text-xl text-center">{{ __('Reset Password') }}</h3>

        @if (session('status'))
            <div class="w-full bg-blue-500 text-white mt-2" role="alert">
                <div class="container mx-auto py-4 px-6">
                    <div class="flex">
                        <svg viewBox="0 0 40 40" class="h-6 w-6 fill-current">
                            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                        </svg>

                        <p class="mx-3">{{ session('status') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <form class="mt-4" method="POST" action="{{ route('password.email') }}">
            @csrf 

            <label class="block">
                <span class="text-white text-sm">{{ __('E-Mail Address') }}</span>
                <input id="email" type="email" class="form-input mt-1 block w-full rounded-md bg-gray-800 border-gray-700 text-white" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            </label>

            <div class="mt-6">
                <button type="submit" class="w-full py-2 px-4 text-center bg-blue-600 rounded-md text-white text-sm hover:bg-blue-500 focus:outline-none">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
