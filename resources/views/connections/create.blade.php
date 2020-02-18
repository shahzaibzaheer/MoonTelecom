@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Create Connection'])
        <div class="content-container create_connection">
            <form  action="{{route('connections.store')}}" method="POST" class="create_connection_container">
                @csrf
                <div class="contact_detail">
                    <h2 class="heading">Contact Detail</h2>
                    <div class="form_element">
                        <label for="username">Username</label>
                        <input required id="username" type="text" name="username" placeholder="Enter Username"  value="{{ old('username') }}">
                        <span class="danger">@error('username') *{{ $message  }}@enderror</span>
                    </div>
                    <div class="form_element_group">
                        <div class="form_element">
                            <label for="name">Name</label>
                            <input required id="name" type="text" name="name" placeholder="Enter Name" value="{{ old('name') }}">
                            <span class="danger">@error('name') *{{ $message  }}@enderror</span>
                        </div>
                        <div class="form_element">
                            <label for="fathername">Father Name</label>
                            <input required id="fathername" type="text" name="fathername" placeholder="Enter Father Name" value="{{ old('fathername') }}">
                            <span class="danger">@error('fathername') *{{ $message  }}@enderror</span>
                        </div>
                    </div>
                    <div class="form_element_group">
                        <div class="form_element">
                            <label for="phone">Phone Number</label>
                            <input  id="phone" type="text" name="phone" placeholder="Enter Phone Number" value="{{ old('phone') }}">
                        </div>
                        <div class="form_element">
                            <label for="email">Email</label>
                            <input  id="email" type="text" name="email" placeholder="Enter Email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form_element_group">
                        <div class="form_element">
                            <label for="cnic">CNIC</label>
                            <input  id="cnic" type="text" name="cnic" placeholder="34104-2769454-9" value="{{ old('cnic') }}">
                        </div>
                        <div class="form_element">
                            <label for="village">Village</label>
                            <select required id="village" name="village_id">
                                <option value="">Select Village</option>
                                @foreach($villages as $village)
                                    <option value="{{$village->id}}"   @if(old('village_id') == $village->id) selected @endif   >{{$village->name}}</option>
                                @endforeach
                            </select>
                            <span class="danger">@error('village_id') *{{ $message  }}@enderror</span>
                        </div>
                    </div>
                    <div class="form_element">
                        <label for="installationAddress">Installation Address</label>
                        <input required id="installationAddress" type="text" name="installationAddress" placeholder="Enter Installation Address" value="{{ old('installationAddress') }}">
                        <span class="danger">@error('installationAddress') *{{ $message  }}@enderror</span>
                    </div>
                    <div class="form_element checkbox">
                        <input v-model="isBillingAddressSame" id="billingAddressCheckbox" type="checkbox" name="billingAddressCheckbox" >
                        <label for="billingAddressCheckbox">Billing Address is same as installation address</label>
                    </div>
                    <div class="form_element" v-show="!isBillingAddressSame">
                        <label for="billingAddress">Billing Address</label>
                        <input id="billingAddress" type="text" name="billingAddress" placeholder="Enter Installation Address" value="{{ old('billingAddress') }}" >
                    </div>
                </div>
                <div class="package_detail">
                    <h2 class="heading" >Package Detail</h2>
                    <div class="form_element">
                        <label for="package">Package</label>
                        <select id="package" name="package_id" :required="isCustomPackage != true" :disabled="isCustomPackage == true">
                            <option value="">Select Package</option>
                            @foreach($packages as $package)
                                <option value="{{$package->id}}" @if(old('package_id') == $package->id) selected @endif >{{$package->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form_element checkbox">
                        <input v-model="isCustomPackage" id="customPackageCheckbox" type="checkbox" name="customPackageCheckbox" >
                        <label for="customPackageCheckbox">Create Custom Package</label>
                    </div>

                    <div class="form_element" v-show="isCustomPackage">
                        <label for="bandwidth">Bandwidth</label>
                        <input id="bandwidth" type="number" name="bandwidth" placeholder="1000kb" value="{{ old('bandwidth') }}" >
                    </div>
                    <div class="form_element" v-show="isCustomPackage">
                        <label for="monthPrice" >Month Price</label>
                        <input id="monthPrice" type="number" name="monthPrice" placeholder="Rs.1000" value="{{ old('monthPrice') }}" >
                    </div>
                    <div class="form_element">
                        <label for="installationFees">Installation Fees</label>
                        <input required id="installationFees" type="number" name="installationFees" placeholder="Rs.6500" value="{{ old('installationFees') }}" >
                    </div>
                    <input class="btn" type="submit" name="Submit" value="Create" >
                </div>
            </form>
        </div>
    </div>

@endsection
