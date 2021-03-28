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
            Configure your environment mannually.
        </div>

        <div class="text-left w-10/12 mt-8">
            <pre class="w-full"><code class="w-full" contenteditable="true" id="env">{{$env}}</code></pre>
        </div>

        <div class="text-center my-6">
            <form id="env-form" enctype="multipart/form-data" method="post" action="{{ route('install.env.editor') }}">
                @csrf
                <button type="submit" class="ml-5 bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded-full">
                    <i class="ml-2 fas fa-edit"></i> Save environment
                </button>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        hljs.highlightAll();

        document.getElementById('env-form').addEventListener('submit', (event) => {
            event.preventDefault();

            let input = document.createElement('input');
            input.setAttribute('type', 'hidden');
            input.setAttribute('name', 'env');
            input.setAttribute('value', document.getElementById('env').innerText);
            event.target.appendChild(input);
            event.target.submit();
        })
    </script>
</body>

@endsection
