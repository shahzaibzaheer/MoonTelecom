@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Villages'])

        <div class="content-container">
            <div class="page_header"></div>
            <div class="page_body">

                <form class="create_box" action="{{route('villages.store')}}" method="POST">
                    <span class="title">Create New Village</span>
                    @csrf
                    <div class="form_element">
                        <label for="name">Village Name</label>
                        <input id="name" type="text" name="name" placeholder="Enter Village Name" autofocus>
                    </div>
                    <input class="btn" type="submit" name="Submit" value="Create Village" >
                </form>

            </div>
            <div class="page_footer"></div>
        </div>

@endsection
