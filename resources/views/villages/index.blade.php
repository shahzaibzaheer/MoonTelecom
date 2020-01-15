@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation')


        <div class="content-container">
            <div class="header">
                <h1>Villages</h1>
                <a href="{{route('villages.create')}}" class="btn">Add New Village</a>
            </div>

            <table>
                <thead>
                <tr>
                    <th>id</th>
                    <td>Name</td>
                </tr>
                </thead>
                <tbody>
                    @forelse($villages as $village)
                        <tr>
                            <td>{{ $village->id  }}</td>
                            <td>{{ $village->name  }}</td>
                        </tr>
                    @empty
                        <tr>
                            No Record Found
                        </tr>

                    @endforelse

                </tbody>
            </table>

        </div>
    </div>

@endsection
