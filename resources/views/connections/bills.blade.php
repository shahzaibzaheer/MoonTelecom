@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation',['title'=>'Recoveries'])

        <div class="content-container">

            <div class="page_body">
{{--                <recoveries :recoveries="{{ json_encode($recoveries) }}"></recoveries>--}}
            </div>

            <div class="page_footer"></div>
        </div>
    </div>

@endsection
