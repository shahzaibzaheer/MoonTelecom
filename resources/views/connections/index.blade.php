@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation')

        <div class="content-container">
            <div class="header">
                <h1>Connections</h1>
                <a href="{{route('connections.create')}}" class="btn">Create New Connection</a>
            </div>

            <table>
                <thead>
                <tr>
                    <th>id</th>
                    <td>Name</td>
                    <td>Bandwidth</td>
                    <td>Monthly Fees</td>
                </tr>
                </thead>
                <tbody>
                    @forelse($connections as $connection)
                        <tr>
                            <td>{{ $connection->id  }}</td>
                            <td>{{ $connection->name  }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td>
                                No Record Found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
