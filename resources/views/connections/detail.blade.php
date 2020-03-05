@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Connection Detail'])
        <div class="content-container">
            <div class="page_header"></div>
            <div class="page_body">

                <div class="connection_detail_container">
                    <div class="connection_detail" >

                        <div class="contact_info">
                            <h2 class="title">Contact Detail</h2>
                            <div class="data">
                                <div class="data_item">
                                    <strong>Username:</strong>
                                    <span>{{$connection->username}}</span>
                                </div>
                                <div class="data_item">
                                    <strong>Name:</strong>
                                    <span>{{$connection->name}}</span>
                                </div>
                                <div class="data_item">
                                    <strong>Father Name:</strong>
                                    <span>{{$connection->fathername}}</span>
                                </div>
                                <div class="data_item">
                                    <strong>Created On:</strong>
                                    <span>{{$connection->created_at->format('d-M-Y')}}</span>
                                </div>
                                <div class="data_item">
                                    <strong>CNIC:</strong>
                                    <span>{{$connection->cnic}}</span>
                                </div>
                                <div class="data_item">
                                    <strong>Phone:</strong>
                                    <span>{{$connection->phone}}</span>
                                </div>
                                <div class="data_item">
                                    <strong>Email:</strong>
                                    <span>{{$connection->email}}</span>
                                </div>
                                <div class="data_item">
                                    <strong>Village:</strong>
                                    <span>{{$connection->village->name}}</span>
                                </div>
                                <div class="data_item">
                                    <strong>Installation Address:</strong>
                                    <span>{{$connection->installationAddress}}</span>
                                </div>
                                @isset($connection->billingAddress)
                                    <div class="data_item">
                                        <strong>Billing Address:</strong>
                                        <span>{{$connection->billingAddress}}</span>
                                    </div>
                                @endisset

                            </div>
                        </div>
                        <div class="package_detail">
                            <h2 class="title">Package Detail</h2>
                            <div class="data">
                                <div class="data_item">
                                    <strong>Package Name:</strong>
                                    <span>{{$connection->package->name}}</span>
                                </div>
                                <div class="data_item">
                                    <strong>Bandwidth:</strong>
                                    <span>{{$connection->package->bandwidth}}</span>
                                </div>
                                <div class="data_item">
                                    <strong>Monthly Fees:</strong>
                                    <span>{{$connection->package->fees}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bill_detail">
                        <div class="bill_summary">
                            <h2 class="title">Bill Summary</h2>
                            @php
                                $PAID = 2;
                                $NOT_PAID = 1;
                                $NOT_RECOVERED = 0;
                            @endphp

                            <div class="data">
                                <div class="data_item">
                                    <strong>Bill Status:</strong>
                                    @if($connection->currentBill->status == $NOT_RECOVERED)
                                        <span>Not Recovered</span>
                                    @elseif($connection->currentBill->status == $NOT_PAID)
                                        <span>Not Paid</span>
                                    @elseif($connection->currentBill->status == $PAID)
                                        <span class="success">Paid</span>
                                    @endif
                                </div>
                                <div class="data_item">
                                    <strong>Billing Month:</strong>
                                    <span>{{ $connection->currentBill->getBillingMonth() }}</span>
                                </div>
                                <div class="data_item">
                                    <strong>Amount Due:</strong>
                                    <span>{{ $connection->currentBill->due }}</span>
                                </div>
                                <div class="data_item">
                                    <strong>Current Bill:</strong>
                                    <span>{{ $connection->currentBill->billAmount }}</span>
                                </div>
                                <div class="data_item">
                                    <strong>Total:</strong>
                                    <span>{{ $connection->currentBill->due +   $connection->currentBill->billAmount }}</span>
                                </div>
                                @if($connection->currentBill->status == $PAID)
                                    <div class="data_item">
                                        <strong>Amount Paid:</strong>
                                        <span>Rs.{{ $connection->currentBill->amountPaid }}</span>
                                    </div>
                                    <div class="data_item">
                                        <strong>Remaining:</strong>
                                        <span>Rs.{{ ($connection->currentBill->due + $connection->currentBill->billAmount) - $connection->currentBill->amountPaid }}</span>
                                    </div>
                                @endif

                            </div>
                            <a href="{{ route('connections.invoice', $connection->id) }}" class="btn"> Pay Now </a>
                            <a href="{{route('connections.history', $connection->id)}}">Bill History</a>
{{--                            <a href="{{route('connections.recoveries', $connection->id )}}">See All Recoveries</a>--}}
                        </div>
                        @if(auth()->user()->isAdmin)
                        <div class="buttons_container">
                            <a href="{{ route('connections.edit', $connection->id) }}" class="btn">Edit Connection</a>
                            <a href="{{ route('connections.block',$connection->id) }}" class="btn">
                                @if($connection->isBlocked)
                                    UnBlock
                                @else
                                    Block
                                @endif
                            </a>
                            <a href="{{ route('connections.delete', $connection->id) }}" class="btn danger">Delete</a>

                            <div class="page_footer">
                                @if($connection->isBlocked)
                                    <h1 style="color:red">Blocked</h1>
                                @endif
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
