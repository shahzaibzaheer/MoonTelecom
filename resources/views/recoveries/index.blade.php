@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation',['title'=>'Recent Recoveries'])

        <div class="content-container">
            <div class="page_body">


                <recoveries
                        :users="{{ json_encode($users) }}"
                        :recoveries="{{ json_encode($recentRecoveries) }}"
                        :villages="{{json_encode($villages)}}"
                        :admin="{{ json_encode($isAdmin )}}"
                > </recoveries>
{{--                <bills :bills="{{ json_encode($bills) }}"></bills>--}}
                {{--                <recoveries :recoveries="{{ json_encode($recoveries) }}"></recoveries>--}}
            </div>
            <div class="page_footer"></div>
        </div>
    </div>

@endsection
