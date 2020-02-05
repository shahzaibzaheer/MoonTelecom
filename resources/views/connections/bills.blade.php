@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation',['title'=>'Bill History'])

        <div class="content-container">

            <div class="page_body">
                <bills :bills="{{ json_encode($bills) }}"></bills>
{{--                <recoveries :recoveries="{{ json_encode($recoveries) }}"></recoveries>--}}
            </div>

            <div class="page_footer"></div>
        </div>
    </div>

@endsection
