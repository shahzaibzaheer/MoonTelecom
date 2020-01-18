@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>"Connections"])

        <div class="content-container">
            <div class="page_header">
                <a href="{{route('connections.create')}}" class="btn">Create New Connection</a>
            </div>

            <div class="page_body">
{{--                <packages :pkgs="{{json_encode($packages)}}"> </packages>--}}

            </div>

            <div class="page_footer"></div>
        </div>
    </div>
@endsection
