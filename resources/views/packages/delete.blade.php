@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Packages'])

        <div class="content-container">
            <div class="page_header"></div>
            <div class="page_body">

                <form  class="dialog"  action="{{route('packages.destroy',$package->id)}}" method="POST">
                    @method('DELETE')
                    <span class="title">Delete Package</span>
                    @csrf
                    <p> Are you sure?</p>

                    <div class="buttons_container">
                        <input class="btn" type="submit" name="delete" value="yes" >
                        <input class="btn" type="submit" name="delete" value="no" >
                    </div>
                </form>
            </div>
            <div class="page_footer"></div>
        </div>

@endsection
