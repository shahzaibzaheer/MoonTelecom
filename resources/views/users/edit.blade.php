@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Users'])
        <div class="content-container">
            <div class="page_header"></div>
            <div class="page_body">

                <form action="{{route('users.update', $user->id)}}" method="POST">
                    @method('PUT')
                    @csrf
                    <span class="title">Edit User</span>
                    <div class="form_element">
                        <label for="name">Name</label>
                        <input id="name" type="text" name="name" placeholder="Enter Name" value="{{$user->name}}">
                    </div>
                    <div class="form_element">
                        <label for="email">Email</label>
                        <input id="email" type="email" name="email" placeholder="Enter Email" value="{{$user->email}}">
                    </div>
                    @if($user->id !== $current_user_id)
                    <div class="form_element">
                        <label for="role">Role</label>
                        <select id="role" name="role">
                            <option value="1" @if($user->isAdmin) selected @endif>Admin</option>
                            <option value="0" @if(!$user->isAdmin) selected @endif>Employee</option>
                        </select>
                    </div>
                    @endif
                    <div class="form_element">
                        <label for="password">New Password (optional)</label>
                        <input id="password" type="text" name="Password" placeholder="Enter Password">
                    </div>
                    <div class="form_element">
                        <label for="ConfirmPassword">Confirm New Password (optional)</label>
                        <input id="ConfirmPassword" type="text" name="ConfirmPassword" placeholder="Confirm Enter Password">
                    </div>

                    <input class="btn" type="submit" name="Submit" value="Update User" >
                </form>

            </div>
            <div class="page_footer"></div>

        </div>



@endsection
