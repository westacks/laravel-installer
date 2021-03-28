@extends('installer::layout')

@section('title', __('Setup wizard'))

@section('body')

<body>
    @include('installer::include.wizard', ['step' => 1])

    <div style="min-height: calc(100vh - 224px)" class="flex flex-col items-center justify-center">
        <div class="text-center text-3xl mt-6 font-bold">
            Well Done!
        </div>

        <div class="text-center mt-6">
            Your application successfully configured. There are few steps left which we will handle manually.
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('install.complete') }}" class="mx-auto bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded-full">
                Finish installation
            </a>
        </div>
    </div>
</body>

@endsection
