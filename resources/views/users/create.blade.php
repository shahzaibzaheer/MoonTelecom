@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation')


        <div class="content-container">
            <h1>Create New User</h1>
        </div>


        <form action="{{route('user.store')}}" method="POST">
            @csrf

            <input type="text" name="name" placeholder="Enter Name">
            <input type="email" name="email" placeholder="Enter Email">
            <select name="role">
                <option value="1">Admin</option>
                <option value="0" selected>Employee</option>
            </select>
            <input type="password" name="Password" placeholder="Enter Password">
            <input type="submit" name="Submit" value="Create User" >

        </form>

@endsection
