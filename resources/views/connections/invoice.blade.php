@extends('layouts.app')

@section('content')
    <div id="app">
        @include('components.navigation', ['title'=>'Invoice'])

        <div class="content-container">
            <div class="page_header"></div>
            <div class="page_body">

                <form action="{{route('recoveries.store')}}" method="POST" class="invoice_container">
                    @csrf
                    <input type="hidden" name="bill_id" value="{{$bill->id}}">
                    <input type="hidden" name="connection_id" value="{{$connection->id}}">

                    <strong class="title">Invoice</strong>
                    <div class="invoice_data_container">
                        <div class="contact_data">
                            <div class="data_item">
                                <strong>Username:</strong>
                                <span>{{ $connection->username }}</span>
                            </div>
                            <div class="data_item">
                                <strong>Name:</strong>
                                <span>{{ $connection->name }}</span>
                            </div>
                            <div class="data_item">
                                <strong>Father Name:</strong>
                                <span>{{ $connection->fathername }}</span>
                            </div>
                            <div class="data_item">
                                <strong>Village:</strong>
                                <span>{{ $connection->village->name }}</span>
                            </div>
                            <div class="data_item">
                                <strong>Billing Address:</strong>
                                <span>{{ $connection->billingAddress() }}</span>
                            </div>
                        </div>
                        <div class="bill_data">
                            <div class="data_item">
                            @php
                                $PAID = 2;
                                $NOT_PAID = 1;
                                $NOT_RECOVERED = 0;
                            @endphp

                                <strong>Bill Status:</strong>
                            @if($bill->status == $NOT_RECOVERED)
                                <span>Not Recovered</span>
                            @elseif($bill->status == $NOT_PAID)
                                <span>Not Paid</span>
                            @elseif($bill->status == $PAID)
                                <span class="success">Paid</span>
                            @endif

                            </div>
                            <div class="data_item">
                                <strong>Billing Month:</strong>
                                <span>{{ $bill->getBillingMonth() }}</span>
                            </div>
                            <div class="data_item">
                                <strong>Amount Due:</strong>
                                <span>Rs.{{ $bill->due }}</span>
                            </div>
                            <div class="data_item">
                                <strong>Current Bill:</strong>
                                <span>Rs.{{ $bill->billAmount }}</span>
                            </div>
                            <div class="data_item">
                                <strong>Total:</strong>
                                <span>Rs.{{ $bill->due + $bill->billAmount }}</span>
                            </div>

                            @if($bill->status == $PAID)
                                <div class="data_item">
                                    <strong>Amount Paid:</strong>
                                    <span>Rs.{{ $bill->amountPaid }}</span>
                                </div>
                                <div class="data_item">
                                    <strong>Remaining:</strong>
                                    <span>Rs.{{ ($bill->due + $bill->billAmount) - $bill->amountPaid }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form_element_container">
                        <div class="form_element">
                            <label for="amount">Enter Amount</label>
                            <input id="amount" type="number" name="amount" placeholder="Enter Amount" autofocus required>
                            <span class="danger">@error('amount') *{{ $message  }}@enderror</span>
                        </div>
                        <div class="form_element">
                            <label for="comment">Enter Comment</label>
                            <input id="comment" type="text" name="comment" placeholder="Enter Comment" >
                        </div>
                        <input class="btn" type="submit" name="Submit" value="Pay Now" >
                    </div>

                    @if(! $bill->status == $NOT_RECOVERED)
                        <a  href="{{route('bills.bill.recoveries',$bill->id)}}">Show Recoveries</a>
                    @endif
                    <a href="{{route('connections.show',$connection->id)}}">Connection Detail</a>
                    <a  href="{{route('connections.index')}}">All Connections</a>

                </form>

            </div>
            <div class="page_footer"></div>
        </div>

@endsection
