@extends('installer::layout')

@section('title', __('Setup wizard'))

@section('body')

<body>
    @include('installer::include.wizard', ['step' => 4])

    <div style="min-height: calc(100vh - 224px)" class="flex flex-col items-center justify-center">
        <div class="text-center text-3xl mt-6 font-bold">
            Environment
        </div>

        <div class="text-center mt-6">
            Select the way you want to configure your app environment.
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('install.env.wizard') }}" class="mr-5 bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded-full">
                <i class="ml-2 fas fa-magic"></i> Form wizard
            </a>
            <a href="{{ route('install.env.editor') }}" class="ml-5 bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded-full">
                <i class="ml-2 fas fa-edit"></i> Edit mannually (advanced)
            </a>
        </div>
    </div>
</body>

@endsection