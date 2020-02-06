@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation',['title'=>'Recent Recoveries'])

        <div class="content-container">
            <div class="page_body">


                <recoveries :recoveries="{{ json_encode($recentRecoveries) }}"> </recoveries>
{{--                <bills :bills="{{ json_encode($bills) }}"></bills>--}}
                {{--                <recoveries :recoveries="{{ json_encode($recoveries) }}"></recoveries>--}}
            </div>
            <div class="page_footer"></div>
        </div>
    </div>

@endsection
