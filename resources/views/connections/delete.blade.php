@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Connections'])

        <div class="content-container">
            <div class="page_header"></div>
            <div class="page_body">

                <form  class="dialog"  action="{{route('connections.destroy',$connection->id)}}" method="POST">
                    @method('DELETE')
                    <span class="title">Delete Connection</span>
                    @csrf
                    <p> Are you sure?</p>
                    <div class="buttons_container">
                        <button class="btn" type="submit" name="delete" value="yes" >Delete</button>
                        <button class="btn" type="submit" name="delete" value="no" >Cancel</button>
                    </div>

                </form>

            </div>
            <div class="page_footer"></div>
        </div>

@endsection
