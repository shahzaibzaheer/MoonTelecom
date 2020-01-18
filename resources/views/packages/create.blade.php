@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Packages'])


        <div class="content-container">
            <div class="page_header"></div>
            <div class="page_body">
                <form action="{{route('packages.store')}}" method="POST">
                    <span class="title">Create New Package</span>
                    @csrf
                    <div class="form_element">
                        <label for="name">Package Name</label>
                        <input id="name" type="text" name="name" placeholder="Enter Package Name">
                    </div>
                    <div class="form_element">
                        <label for="bandwidth">Bandwidth</label>
                        <input id="bandwidth" type="number" name="bandwidth" placeholder="Enter Bandwidth">
                    </div>
                    <div class="form_element">
                        <label for="fees">Monthly Fees</label>
                        <input id="fees" type="number" name="fees" placeholder="Enter Fees">
                    </div>

                    <input class="btn" type="submit" name="Submit" value="Create Package" >
                </form>

            </div>
            <div class="page_footer"></div>

        </div>
@endsection
