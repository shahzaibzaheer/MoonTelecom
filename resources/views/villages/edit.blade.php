@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Villages'])

        <div class="content-container">
            <div class="page_header"></div>
            <div class="page_body">

                <form action="{{route('villages.update',$village->id)}}" method="POST">
                    @method('PUT')
                    <span class="title">Edit Village</span>
                    @csrf
                    <div class="form_element">
                        <label for="name">Village Name</label>
                        <input id="name" type="text" name="name" placeholder="Enter Village Name" autofocus
                               value="{{ $village->name }}">
                    </div>
                    <input class="btn" type="submit" name="Submit" value="Update Village" >
                </form>

            </div>
            <div class="page_footer"></div>
        </div>

@endsection
