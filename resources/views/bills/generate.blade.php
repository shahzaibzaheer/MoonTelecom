@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Generate Bill'])


        <div class="content-container">
            <div class="page_header"></div>
            <div class="page_body">
                <form  class="create_box"  action="{{route('bills.generate')}}" method="POST">
                    <span class="title">Generate Bills</span>
                    @csrf
                    <div class="form_element generate_bill_meta ">
                        <p>Last Bill Was Generated at <strong>{{ \Illuminate\Support\Carbon::parse($last_bill_timestamp)->toDateString() }}</strong></p>
                        <p><strong>{{ \Illuminate\Support\Carbon::parse($last_bill_timestamp)->diffForhumans() }}</strong></p>
                    </div>
                    <div class="form_element">
                        <label for="name">Please Enter Bill Generation Password </strong> ?</label>
                        <input id="name" type="text" name="confirm" placeholder="Enter Bill Generation Password">
                        @error('confirm')<span class="danger">*{{$message}}</span>@enderror()
                    </div>
                    <input class="btn" type="submit" name="Submit" value="Generate" >
                </form>

            </div>
            <div class="page_footer"></div>

        </div>
@endsection
