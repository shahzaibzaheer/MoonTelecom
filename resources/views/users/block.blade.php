@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Users'])

        <div class="content-container">
            <div class="page_header"></div>
            <div class="page_body">

                <form action="{{route('users.destroy',$user->id)}}" method="POST">
                    @method('DELETE')
                    @if(!$user->isBlocked)
                        <span class="title">Block User</span>
                    @else
                        <span class="title">unBlock User</span>
                    @endif

                    @csrf
                    <h2> Are you sure ?</h2>
                    <span>User Name: {{$user->name}}</span>
                    <span>Email: {{$user->email}}</span>

                    @if(!$user->isBlocked)
                        <button class="btn " type="submit" name="block" value="1" >Block</button>
                    @else
                        <button class="btn" type="submit" name="block" value="0" >Un Block</button>
                    @endif
                    <button class="btn" type="submit" >Cancel</button>

                </form>

            </div>
            <div class="page_footer"></div>
        </div>

@endsection
