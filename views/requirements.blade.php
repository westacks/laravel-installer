@extends('installer::layout')

@section('title', __('Setup wizard'))

@section('body')

<body>
    @include('installer::include.wizard', ['step' => 2])

    <div style="min-height: calc(100vh - 224px)" class="flex flex-col items-center justify-center">
        <div class="text-center text-3xl mt-6 font-bold">
            Server Requirements
        </div>

        <div class="text-center mt-6">
            <table class="table-auto text-left width-60">
                <tbody>
                    @foreach($requirements['requirements'] as $type => $requirement)
                        @foreach($requirement as $module => $supports)
                            <tr>
                                <td class="pr-8">{{$type .' '.$module}}</td>
                                <td class="text-right {{ $supports ? 'text-green-700' : 'text-red-700' }}">
                                    <i class="fas {{ $supports ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                                    @if($type .' '.$module == 'php version')
                                        {{phpversion()}} (Required: {{ config('installer.requirements.php_version') }})
                                    @else
                                        {{ $supports ? 'installed' : 'not found' }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($requirements['errors'])
            <div class="text-center mt-6 text-red-700 font-bold">
                Please, fix all server requirements issues and reload the page
            </div>
        @endif

        <div class="text-center mt-8">
            <a {{ !$requirements['errors'] ? 'href='.route('install.permissions') : '' }}
                class="mx-auto bg-red-500 {{ $requirements['errors'] ? 'opacity-50 cursor-not-allowed' : 'hover:bg-red-700' }}  text-white py-2 px-4 rounded-full">
                    Check permissions <i class="ml-2 fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</body>

@endsection
