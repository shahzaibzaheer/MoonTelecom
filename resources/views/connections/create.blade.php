@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Create Connection'])
        <div class="content-container">
            <form  action="{{route('connections.store')}}" method="POST" class="create_connection_container">
                @csrf
                <div class="contact_detail">
                    <h2 class="heading">Contact Detail</h2>
                    <div class="form_element">
                        <label for="username">Username</label>
                        <input id="username" type="text" name="username" placeholder="Enter Username">
                    </div>
                    <div class="form_element_group">
                        <div class="form_element">
                            <label for="name">Name</label>
                            <input id="name" type="text" name="name" placeholder="Enter Name">
                        </div>
                        <div class="form_element">
                            <label for="fathername">Father Name</label>
                            <input id="fathername" type="text" name="fathername" placeholder="Enter Father Name">
                        </div>
                    </div>
                    <div class="form_element_group">
                        <div class="form_element">
                            <label for="phone">Phone Number</label>
                            <input id="phone" type="text" name="phone" placeholder="Enter Phone Number">
                        </div>
                        <div class="form_element">
                            <label for="email">Email</label>
                            <input id="email" type="text" name="email" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="form_element_group">
                        <div class="form_element">
                            <label for="cnic">CNIC</label>
                            <input id="cnic" type="text" name="cnic" placeholder="34104-2769454-9">
                        </div>
                        <div class="form_element">
                            <label for="village">Village</label>
                            <select id="village" name="village_id">
                                <option value="">Select Village</option>
                                @foreach($villages as $village)
                                    <option value="{{$village->id}}">{{$village->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form_element">
                        <label for="installationAddress">Installation Address</label>
                        <input id="installationAddress" type="text" name="installationAddress" placeholder="Enter Installation Address">
                    </div>
                    <div class="form_element checkbox">
                        <input v-model="isBillingAddressSame" id="billingAddressCheckbox" type="checkbox" name="billingAddressCheckbox" >
                        <label for="billingAddressCheckbox">Billing Address is same as installation address</label>
                    </div>
                    <div class="form_element" v-show="!isBillingAddressSame">
                        <label for="billingAddress">Billing Address</label>
                        <input id="billingAddress" type="text" name="billingAddress" placeholder="Enter Installation Address">
                    </div>
                </div>
                <div class="package_detail">
                    <h2 class="heading" >Package Detail</h2>
                    <div class="form_element">
                        <label for="package">Package</label>
                        <select id="package" name="package_id" :disabled="isCustomPackage == true">
                            <option value="">Select Package</option>
                            @foreach($packages as $package)
                                <option value="{{$package->id}}">{{$package->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form_element checkbox">
                        <input v-model="isCustomPackage" id="customPackageCheckbox" type="checkbox" name="customPackageCheckbox" >
                        <label for="customPackageCheckbox">Create Custom Package</label>
                    </div>

                    <div class="form_element" v-show="isCustomPackage">
                        <label for="bandwidth">Bandwidth</label>
                        <input id="bandwidth" type="number" name="bandwidth" placeholder="1000kb">
                    </div>
                    <div class="form_element" v-show="isCustomPackage">
                        <label for="monthPrice" >Month Price</label>
                        <input id="monthPrice" type="number" name="monthPrice" placeholder="Rs.1000">
                    </div>
                    <div class="form_element">
                        <label for="installationFees">Installation Fees</label>
                        <input id="installationFees" type="number" name="installationFees" placeholder="Rs.6500">
                    </div>
                    <input class="btn" type="submit" name="Submit" value="Create" >
                </div>
            </form>
        </div>
    </div>

@endsection
