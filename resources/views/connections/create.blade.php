@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation')


        <div class="content-container">
            <h1>Create New Connection</h1>
        </div>


        <form action="{{route('connections.store')}}" method="POST">
            @csrf

            <input type="text" name="username" placeholder="Enter Unique Username">
            <input type="text" name="name" placeholder="Enter Name">
            <input type="text" name="fathername" placeholder="Enter Father Name">
            <input type="text" name="cnic" placeholder="Enter CNIC">
            <input type="text" name="phone" placeholder="Enter Phone Number">
            <input type="email" name="email" placeholder="Enter Email">


            <select name="village_id" id="">
                @forelse ( $villages as $village)
                <option value="{{ $village->id}}">{{$village->name}}</option>
                @empty
                    <option value="">No Village</option>
                @endforelse
            </select>

            <input type="text" name="installationAddresss" placeholder="Enter installation Addresss">
            <input type="text" name="billingAddresss" placeholder="Enter Billing Addresss">



            <select name="package_id" id="">
                @forelse ( $packages as $package)
                <option value="{{ $package->id}}">{{$package->name}}</option>
                @empty
                    <option value="">No package</option>
                @endforelse
            </select>


            <input type="number" name="installationFees" placeholder="Enter Installation Fees">



            
            
            <input type="submit" name="Submit" class="btn" value="Create Connection" >

        </form>

@endsection
