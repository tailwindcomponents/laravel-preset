@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center mt-16 mx-6">
    <div class="p-6 max-w-sm w-full bg-white shadow rounded-md">
        <h3 class="text-gray-700 text-xl text-center">{{ __('Confirm Password') }}</h3>

         <p class="text-gray-600 mt-3">{{ __('Please confirm your password before continuing.') }}</p>

        <form class="mt-4" method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <label class="block mt-3">
                <span class="text-gray-700 text-sm">{{ __('Password') }}</span>
                <input id="password" type="password" class="form-input mt-1 block w-full rounded-md" name="password" required autocomplete="current-password">
            
                @error('password')
                    <span class="text-sm text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </label>

            <div class="mt-6">
                <button type="submit" class="w-full py-2 px-4 text-center bg-blue-600 rounded-md text-white text-sm hover:bg-blue-500 focus:outline-none">
                    {{ __('Confirm Password') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
