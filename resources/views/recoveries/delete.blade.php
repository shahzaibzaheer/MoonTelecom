@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Recoveries'])

        <div class="content-container">
            <div class="page_header"></div>
            <div class="page_body">

                <form action="{{route('recoveries.delete',$recovery->id)}}" method="POST">
                    @method('DELETE')
                    <span class="title">Delete Recovery</span>
                    @csrf
                    <h2> Are you sure?</h2>
                    <br>
                    <br>
                    <button class="btn" type="submit" name="delete" value="1">Delete</button>
                    <br>
                    <button class="btn" type="submit" name="delete" value="0">Cancel</button>
                </form>

            </div>
            <div class="page_footer"></div>
        </div>

@endsection
