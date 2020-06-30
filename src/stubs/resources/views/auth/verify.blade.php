@extends('layouts.app')

@section('content')
<div class="flex items-center justify-center mt-16 mx-6">
    <div class="p-6 bg-white shadow rounded-md">
        <h3 class="text-gray-700 text-lg">{{ __('Verify Your Email Address') }}</h3>

        @if (session('resent'))
            <div class="w-full bg-blue-500 text-white" role="alert">
                <div class="container mx-auto py-4 px-6">
                    <div class="flex">
                        <svg viewBox="0 0 40 40" class="h-6 w-6 fill-current">
                            <path d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"></path>
                        </svg>

                        <p class="mx-3">{{ __('A fresh verification link has been sent to your email address.') }}</p>
                    </div>
                </div>
            </div>
        @endif
        
        <p class="text-gray-600 mt-3">{{ __('Before proceeding, please check your email for a verification link.') }} {{ __('If you did not receive the email') }},</p>

        <form class="inline-block" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="text-blue-600 hover:underline mt-1 focus:outline-none">{{ __('click here to request another') }}</button>
        </form>
    </div>
</div>
@endsection
