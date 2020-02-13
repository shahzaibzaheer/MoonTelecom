@extends('layouts.app')

@section('content')
    <div id="app">

        @include('components.navigation', ['title'=>'Dashboard', 'link'=>url('/')])

        <div class="content-container">
            <div class="page_header">
{{--                <a href="{{route('connections.create')}}" class="btn">Create New Connection</a>--}}
            </div>

            <div class="page_body">
                <div class="meta_info_container">
                    <a href="/connections?state=Active"  class="card">
                        <div class="card-body">
                            <svg class="icon" version="1.1" viewBox="0 0 23.486 14" >
                                    <path d="M11.743,98.725c-4.487,0-8.557,2.455-11.559,6.443a.93.93,0,0,0,0,1.11c3,3.992,7.072,6.448,11.559,6.448S20.3,110.27,23.3,106.282a.93.93,0,0,0,0-1.11C20.3,101.18,16.23,98.725,11.743,98.725Zm.322,11.929a4.94,4.94,0,1,1,4.607-4.607A4.943,4.943,0,0,1,12.065,110.654Zm-.149-2.277a2.66,2.66,0,1,1,2.484-2.484A2.656,2.656,0,0,1,11.916,108.377Z" transform="translate(0 -98.725)" />
                            </svg>
                            <div class="content">
                                <span class="heading">Active Connections</span>
                                <span class="data">{{$activeConnections}}</span>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </a>
                    <a href="/connections?status=NotRecovered"  class="card">
                        <div class="card-body">
                            <svg class="icon" version="1.1" viewBox="0 0 23.486 14" >
                                <path d="M11.743,98.725c-4.487,0-8.557,2.455-11.559,6.443a.93.93,0,0,0,0,1.11c3,3.992,7.072,6.448,11.559,6.448S20.3,110.27,23.3,106.282a.93.93,0,0,0,0-1.11C20.3,101.18,16.23,98.725,11.743,98.725Zm.322,11.929a4.94,4.94,0,1,1,4.607-4.607A4.943,4.943,0,0,1,12.065,110.654Zm-.149-2.277a2.66,2.66,0,1,1,2.484-2.484A2.656,2.656,0,0,1,11.916,108.377Z" transform="translate(0 -98.725)" />
                            </svg>
                            <div class="content">
                                <span class="heading">Bill Not Recovered</span>
                                <span class="data">{{$connectionsBillNotRecovered}}</span>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{  now()->monthName }}
                        </div>
                    </a>
                    <a href="/recoveries"  class="card">
                        <div class="card-body">
                            <svg class="icon" version="1.1" viewBox="0 0 23.486 14" >
                                <path d="M11.743,98.725c-4.487,0-8.557,2.455-11.559,6.443a.93.93,0,0,0,0,1.11c3,3.992,7.072,6.448,11.559,6.448S20.3,110.27,23.3,106.282a.93.93,0,0,0,0-1.11C20.3,101.18,16.23,98.725,11.743,98.725Zm.322,11.929a4.94,4.94,0,1,1,4.607-4.607A4.943,4.943,0,0,1,12.065,110.654Zm-.149-2.277a2.66,2.66,0,1,1,2.484-2.484A2.656,2.656,0,0,1,11.916,108.377Z" transform="translate(0 -98.725)" />
                            </svg>
                            <div class="content">
                                <span class="heading">Net Recovery</span>
                                <span class="data">₹{{$netRecovery}}</span>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{  now()->monthName }}
                        </div>
                    </a>
                </div>
            </div>

            <div class="page_footer"></div>
        </div>
       
    </div>

@endsection