@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Villages'])

        <div class="content-container">
            <div class="page_header"></div>
            <div class="page_body">

                <form action="{{route('villages.destroy',$village->id)}}" method="POST">
                    @method('DELETE')
                    <span class="title">Delete Village</span>
                    @csrf
                    <h2> Are you sure?</h2>
                    <span>Village Name: {{$village->name}}</span>
                    <input class="btn" type="submit" name="delete" value="yes" >
                    <br>
                    <input class="btn" type="submit" name="delete" value="no" >
                </form>

            </div>
            <div class="page_footer"></div>
        </div>

@endsection
