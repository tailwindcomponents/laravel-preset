@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center mt-16 mx-6">
    <div class="p-6 max-w-sm w-full bg-white shadow rounded-md">
        <h3 class="text-gray-700 text-xl text-center">{{ __('Reset Password') }}</h3>

        <form class="mt-4" method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <label class="block">
                <span class="text-gray-700 text-sm">{{ __('E-Mail Address') }}</span>
                <input id="email" type="email" class="form-input mt-1 block w-full rounded-md" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                
                @error('email')
                    <span class="text-sm text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>

            <label class="block mt-3">
                <span class="text-gray-700 text-sm">{{ __('Password') }}</span>
                <input id="password" type="password" class="form-input mt-1 block w-full rounded-md" name="password" required autocomplete="new-password">
            
                @error('password')
                    <span class="text-sm text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>

            <label class="block mt-3">
                <span class="text-gray-700 text-sm">{{ __('Confirm Password') }}</span>
                <input id="password-confirm" type="password" class="form-input mt-1 block w-full rounded-md" name="password_confirmation" required autocomplete="new-password">
            </label>

            <div class="mt-6">
                <button class="w-full py-2 px-4 text-center bg-blue-600 rounded-md text-white text-sm hover:bg-blue-500 focus:outline-none">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
