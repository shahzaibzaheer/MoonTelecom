@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Packages'])


        <div class="content-container">
            <div class="page_header"></div>
            <div class="page_body">
                <form class="create_box"  action="{{route('packages.update', $package)}}" method="POST">
                    @method('PUT')
                    <span class="title">Edit Package</span>
                    @csrf
                    <div class="form_element">
                        <label for="name">Package Name</label>
                        <input required id="name" type="text" name="name" placeholder="Enter Package Name" value="{{$package->name}}">
                        <span class="danger">@error('name') *{{ $message  }}@enderror</span>
                    </div>
                    <div class="form_element">
                        <label for="bandwidth">Bandwidth</label>
                        <input required id="bandwidth" type="number" name="bandwidth" placeholder="Enter Bandwidth" value="{{$package->bandwidth}}">
                        <span class="danger">@error('bandwidth') *{{ $message  }}@enderror</span>
                    </div>
                    <div class="form_element">
                        <label for="fees">Monthly Fees</label>
                        <input required id="fees" type="number" name="fees" placeholder="Enter Fees" value="{{$package->fees}}">
                        <span class="danger">@error('fees') *{{ $message  }}@enderror</span>
                    </div>

                    <input class="btn" type="submit" name="Submit" value="Update Package" >
                </form>

            </div>
            <div class="page_footer"></div>

        </div>
@endsection
