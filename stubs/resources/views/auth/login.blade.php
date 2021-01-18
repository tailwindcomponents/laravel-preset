@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center mt-16 mx-6">
    <div class="p-6 max-w-sm w-full bg-white shadow rounded-md">
        <h3 class="text-gray-700 text-xl text-center">{{ __('Login') }}</h3>

        <form class="mt-4" method="POST" action="{{ route('login') }}">
            @csrf

            <label class="block">
                <span class="text-gray-700 text-sm">{{ __('E-Mail Address') }}</span>
                <input type="email" id="email" name="email" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('email') }}" required autocomplete="email" autofocus>
            
                @error('email')
                    <span class="text-sm text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>

            <label class="block mt-3">
                <span class="text-gray-700 text-sm">{{ __('Password') }}</span>
                <input id="password" type="password" class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="password" required autocomplete="current-password">
            
                @error('password')
                    <span class="text-sm text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>

            <div class="flex justify-between items-center mt-4">
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="rounded border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <span class="mx-2 text-gray-600 text-sm">{{ __('Remember Me') }}</span>
                    </label>
                </div>
                
                <div>
                    @if (Route::has('password.request'))
                        <a class="block text-sm text-blue-700 hover:underline" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full py-2 px-4 text-center bg-blue-600 rounded-md text-white text-sm hover:bg-blue-500 focus:outline-none">
                    {{ __('Login') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
