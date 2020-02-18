@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Users'])
        <div class="content-container">
            <div class="page_header"></div>
            <div class="page_body">

                <form class="create_box" action="{{route('users.store')}}" method="POST">
                    <span class="title">Create New User</span>
                    @csrf
                    <div class="form_element">
                        <label for="name">Name</label>
                        <input required id="name" type="text" name="name" placeholder="Enter Name" value="{{old('name')}}">
                        <span class="danger">@error('name') *{{ $message  }}@enderror</span>

                    </div>
                    <div class="form_element">
                        <label for="email">Email</label>
                        <input required id="email" type="email" name="email" placeholder="Enter Email" value="{{old('email')}}">
                        <span class="danger">@error('email') *{{ $message  }}@enderror</span>
                    </div>
                    <div class="form_element">
                        <label for="role">Role</label>
                        <select id="role" name="role">
                            <option value="1">Admin</option>
                            <option value="0" selected>Employee</option>
                        </select>
                        <span class="danger">@error('role') *{{ $message  }}@enderror</span>
                    </div>
                    <div class="form_element">
                        <label for="password">Password</label>
                        <input required id="password" type="text" name="Password" placeholder="Enter Password" value="{{old('Password')}}">
                        <span class="danger">@error('Password') *{{ $message  }}@enderror</span>
                    </div>

                    <input class="btn" type="submit" name="Submit" value="Create User" >
                </form>

            </div>
            <div class="page_footer"></div>

        </div>



@endsection
