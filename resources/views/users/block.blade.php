@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Users'])

        <div class="content-container">
            <div class="page_header"></div>
            <div class="page_body">

                <form  class="dialog"  action="{{route('users.destroy',$user->id)}}" method="POST">
                    @method('DELETE')
                    @if(!$user->isBlocked)
                        <span class="title">Block User</span>
                    @else
                        <span class="title">UnBlock User</span>
                    @endif

                    @csrf
                    <p> Are you sure ?</p>
                    <div class="buttons_container">
                        @if(!$user->isBlocked)
                        <button class="btn " type="submit" name="block" value="1" >Block</button>
                        @else
                        <button class="btn" type="submit" name="block" value="0" >UnBlock</button>
                        @endif
                        <button class="btn" type="submit" >Cancel</button>
                    </div>

                </form>

            </div>
            <div class="page_footer"></div>
        </div>

@endsection
