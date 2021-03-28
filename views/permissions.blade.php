@extends('installer::layout')

@section('title', __('Setup wizard'))

@section('body')

<body>
    @include('installer::include.wizard', ['step' => 3])

    <div style="min-height: calc(100vh - 224px)" class="flex flex-col items-center justify-center">
        <div class="text-center text-3xl mt-6 font-bold">
            Permissions
        </div>

        <div class="text-center mt-6">
            <table class="table-auto text-left width-60">
                <tbody>
                    @foreach($permissions['permissions'] as $permission)
                        <tr>
                            <td class="pr-8">{{ $permission['folder'] }}</td>
                            <td class="text-right {{ $permission['set'] ? 'text-green-700' : 'text-red-700' }}">
                                <i class="fas {{ $permission['set'] ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                {{ $permission['permission'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($permissions['errors'])
            <div class="text-center mt-6 text-red-700 font-bold">
                Please, grant all required permissions and reload the page.
            </div>
        @endif

        <div class="text-center mt-8">
            <a {{ !$permissions['errors'] ? 'href='.route('install.env') : '' }}
                class="mx-auto bg-red-500 {{ $permissions['errors'] ? 'opacity-50 cursor-not-allowed' : 'hover:bg-red-700' }}  text-white py-2 px-4 rounded-full">
                    Configure environment <i class="ml-2 fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</body>

@endsection
