@extends('frontend.master_dashboard')
@section('main')
@section('title')
    Cancel Order
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>HOME</a>
            <span></span> Cancel Orders
        </div>
    </div>
</div>
<div class="page-content pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="row">
                    {{-- Start col-md-2 --}}
                    @include('frontend.body.dashboard_sidebar_menu')
                    {{-- End col-md-2 --}}
                    <div class="col-md-10">
                        <div class="tab-content account dashboard-content pl-50">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel"
                                aria-labelledby="dashboard-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">All Orders You Canceled</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" style="background: #ddd; font-weight: 600;">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Invoice Number</th>
                                                        <th>Order Date</th>
                                                        <th>Cancel Date</th>
                                                        <th>Total Amount</th>
                                                        <th>Payment Method</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $key => $order)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $order->invoice_number }}</td>
                                                            @php
                                                                $cancel_date = strtotime($order->cancel_date);
                                                                $cancel_date_format = date('d-m-Y H:i:s', $cancel_date);
                                                            @endphp
                                                            <td>{{ $cancel_date_format }}</td>
                                                            <td>{{ $order->cancel_date }}</td>
                                                            <td>${{ $order->amount }}</td>
                                                            <td>{{ $order->payment_method }}</td>
                                                            <td>
                                                                <span class="badge rounded-pill bg-success"
                                                                    style="font-size: 13px;">
                                                                    Success
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
