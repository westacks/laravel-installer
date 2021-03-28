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
            Configure your environment mannually.
        </div>

        <div class="text-left w-10/12 mt-8">
            <pre class="w-full"><code class="w-full" contenteditable="true" id="env">{{$env}}</code></pre>
        </div>

        <div class="text-center mt-6">
            <form method="post" action="{{ route('install.env.editor') }}" onsubmit="submitEnv">
                @csrf
                <button type="submit" class="ml-5 bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded-full">
                    <i class="ml-2 fas fa-edit"></i> Save environment
                </button>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        hljs.highlightAll();

        function submitEnv(event) {
            event.preventDefault();
            let data = new FormData(event.target);
            data.append('env', document.getElementById('env').innerText);
            event.target.submit();
        }
    </script>
</body>

@endsection
