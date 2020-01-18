@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation',['title'=>'Villages'])


        <div class="content-container">
            <div class="page_header">
                <a href="{{route('villages.create')}}" class="btn">Create New Village</a>
            </div>

            <div class="page_body">
                <villages :villages="{{json_encode($villages)}}"> </villages>

            </div>

            <div class="page_footer"></div>
        </div>
    </div>

@endsection
