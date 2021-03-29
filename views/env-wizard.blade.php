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
            Fill up form bellow and save your environment settings.
        </div>

        <form method="post" action="{{ route('install.env.wizard.save') }}">
            <div class="text-center mt-8">
                @foreach ($variables as $name => $var)
                    <div class="mb-4 w-10/12">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="{{ $name }}">
                            {{ $var['description'] }}
                        </label>
                        <input type="text" name="{{ $name }}" id="{{ $name }}" value="{{ $var['value'] }}"class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                @endforeach
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