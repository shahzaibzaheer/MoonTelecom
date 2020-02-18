@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Packages'])


        <div class="content-container">
            <div class="page_header"></div>
            <div class="page_body">
                <form  class="create_box"  action="{{route('packages.store')}}" method="POST">
                    <span class="title">Create New Package</span>
                    @csrf
                    <div class="form_element">
                        <label for="name">Package Name</label>
                        <input required id="name" type="text" name="name" placeholder="Enter Package Name">
                        <span class="danger">@error('name') *{{ $message  }}@enderror</span>
                    </div>
                    <div class="form_element">
                        <label for="bandwidth">Bandwidth</label>
                        <input required id="bandwidth" type="number" name="bandwidth" placeholder="Enter Bandwidth">
                        <span class="danger">@error('bandwidth') *{{ $message  }}@enderror</span>

                    </div>
                    <div class="form_element">
                        <label for="fees">Monthly Fees</label>
                        <input required id="fees" type="number" name="fees" placeholder="Enter Fees">
                        <span class="danger">@error('fees') *{{ $message  }}@enderror</span>
                    </div>

                    <input class="btn" type="submit" name="Submit" value="Create Package" >
                </form>

            </div>
            <div class="page_footer"></div>

        </div>
@endsection
