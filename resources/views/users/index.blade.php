@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Users'])


        <div class="content-container">
            <div class="page_header">
                <a href="{{route('user.create')}}" class="btn">Create New User</a>
            </div>
            <div class="page_body">
                <table>
                    <thead>
                    <tr>
                        <th>id</th>
                        <td>Name</td>
                        <td>Role</td>
                        <td>Email</td>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->id  }}</td>
                            <td>{{ $user->name  }}</td>
                            <td>{{ $user->isAdmin  }}</td>
                            <td>{{ $user->email  }}</td>
                        </tr>
                    @empty
                        <tr>
                            No Record Found
                        </tr>

                    @endforelse

                    </tbody>
                </table>
            </div>
            <div class="page_footer"></div>
        </div>
    </div>

@endsection
