@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation')


        <div class="content-container">
            <h1>Create New Package</h1>
        </div>


        <form action="{{route('packages.store')}}" method="POST">
            @csrf

            <input type="text" name="name" placeholder="Enter Package Name">
            <input type="number" name="bandwidth" placeholder="Enter Bandwidth">
            <input type="number" name="fees" placeholder="Enter Bandwidth">
           
            <input type="submit" name="Submit" class="btn" value="Create Package" >

        </form>

@endsection
