@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>"Connections"])

        <div class="content-container">
            <div class="page_header">
                @if(auth()->user()->isAdmin)
                    <a href="{{route('connections.create')}}" class="btn">Create New Connection</a>
                @endif
            </div>

            <div class="page_body">
                <connections
                        :connections="{{  json_encode($connections) }}"
                        :village-names="{{ json_encode($villageNames) }}"
                        :package-names="{{ json_encode($packageNames) }} "
                ></connections>
            </div>

            <div class="page_footer"></div>
        </div>
    </div>
@endsection
