@extends('installer::layout')

@section('title', __('Setup wizard'))

@section('body')

<body>
    @include('installer::include.wizard', ['step' => 2])

    <div style="min-height: calc(100vh - 220px)" class="flex flex-col items-center justify-center">
        <div class="text-center text-3xl mt-6 font-bold">
            Welcome to Application Setup Wizard!
        </div>

        <div class="text-center mt-6">
            We will help you to configure your application step by step.
        </div>

        <div class="text-center mt-7">
            <a href="{{ route('installer.permissions') }}" class="mx-auto bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded-full">
                Check server requirements <i class="ml-2 fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</body>

@endsection
