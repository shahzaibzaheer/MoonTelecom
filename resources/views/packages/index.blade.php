@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation')

        <div class="content-container">
            <div class="header">
                <h1>Packages</h1>
                <a href="{{route('packages.create')}}" class="btn">Create New Package</a>
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
                    @forelse($packages as $package)
                        <tr>
                            <td>{{ $package->id  }}</td>
                            <td>{{ $package->name  }}</td>
                            <td>{{ $package->bandwidth  }} kb</td>
                            <td>Rs.{{ $package->fees  }}</td>
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
