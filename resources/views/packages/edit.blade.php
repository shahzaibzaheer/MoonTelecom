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
                        <input id="name" type="text" name="name" placeholder="Enter Package Name" value="{{$package->name}}">
                    </div>
                    <div class="form_element">
                        <label for="bandwidth">Bandwidth</label>
                        <input id="bandwidth" type="number" name="bandwidth" placeholder="Enter Bandwidth" value="{{$package->bandwidth}}">
                    </div>
                    <div class="form_element">
                        <label for="fees">Monthly Fees</label>
                        <input id="fees" type="number" name="fees" placeholder="Enter Fees" value="{{$package->fees}}">
                    </div>

                    <input class="btn" type="submit" name="Submit" value="Update Package" >
                </form>

            </div>
            <div class="page_footer"></div>

        </div>
@endsection
