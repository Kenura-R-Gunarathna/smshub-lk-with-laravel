@extends('layouts.app')

@section('title', 'Send OTP')

@section('header')
    <x-nav />
@endsection

@section('content')

<section class="dark:bg-gray-900 px-10">
    <div class="py-8 px-4 lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
        <div class="flex flex-col justify-center">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Verify your phone number</h1>
            <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Verify the ownership of your contact number using php and laravel with smshub.lk. Enter your mobile phone number and verify your number by typing the received otp of 6 digits.</p>
            <a href="{{ route('home') }}" class="text-blue-600 dark:text-blue-500 hover:underline font-medium text-lg inline-flex items-center">Verify now
                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
        <div>
            <div class="w-full lg:max-w-xl p-6 space-y-8 sm:p-8 bg-white rounded-lg shadow-xl dark:bg-gray-800">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Send OTP
                </h2>
                
                <livewire:send-otp />
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer')
    <x-footer />
@endsection

