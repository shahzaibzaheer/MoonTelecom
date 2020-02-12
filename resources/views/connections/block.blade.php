@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Connections'])

        <div class="content-container">
            <div class="page_header"></div>
            <div class="page_body">

                <form action="{{route('connections.block',$connection->id)}}" method="POST">
                    @method('DELETE')

                    @if(!$connection->isBlocked)
                        <span class="title">Block Connection</span>
                    @else
                        <span class="title">unBlock Connection</span>
                    @endif

                    @csrf
                    <h2> Are you sure ?</h2>
                    <span>Username: {{$connection->username}}</span>
                    <span>Connection Name: {{$connection->name}}</span>
                    <br>
                    <br>
                    <br>

                    @if(!$connection->isBlocked)
                        <button class="btn " type="submit" name="block" value="1" >Block</button>
                    @else
                        <button class="btn" type="submit" name="block" value="0" >Un Block</button>
                    @endif
                    <br>
                    <button class="btn" type="submit" >Cancel</button>

                </form>

            </div>
            <div class="page_footer"></div>
        </div>

@endsection
