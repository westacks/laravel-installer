@extends('installer::layout')

@section('title', __('Setup wizard'))

@section('body')

<body>
    @include('installer::include.wizard', ['step' => 1])

    <div style="min-height: calc(100vh - 224px)" class="flex flex-col items-center justify-center">
        <div class="text-center text-3xl mt-6 font-bold">
            Environment
        </div>

        <div class="text-center mt-6">
            Fill up form bellow and save your environment settings.
        </div>

        <form method="post" action="{{ route('install.env.wizard') }}">
            @csrf

            <div class="text-center mt-8">
                Form
            </div>

            <div class="text-center mt-6">
                <button type="submit" class="ml-5 bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded-full">
                    <i class="ml-2 fas fa-edit"></i> Save environment
                </button>
            </div>
        
        </form>
    </div>
</body>

@endsection