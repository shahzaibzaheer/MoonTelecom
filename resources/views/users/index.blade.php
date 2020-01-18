@extends('layouts.app')

@section('content')
    <div id="app" >
        @include('components.navigation', ['title'=>'Users'])

        <div class="content-container">
            <div class="page_header">
                <a href="{{route('users.create')}}" class="btn">Create New User</a>
            </div>

            <div class="page_body">
                <users :users="{{json_encode($users)}}"> </users>
            </div>

            <div class="page_footer"></div>
        </div>
    </div>




@endsection
