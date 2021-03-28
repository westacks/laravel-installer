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

        <div class="text-center mt-8">
            <pre><code class="html" contenteditable="true" id="env">...</code></pre>
        </div>
    </div>

    <script type="text/javascript">
        hljs.highlightAll();
    </script>
</body>

@endsection