@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation')

        <div class="content-container">
            <h1>Create New Village</h1>
        </div>


        <form action="{{route('villages.store')}}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Enter Name">
            <input class="btn" type="submit" name="Submit" value="Create User" >
        </form>

@endsection
