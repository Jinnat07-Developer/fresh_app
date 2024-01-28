@extends('website.master')

@section('body')

    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Customer Dashboard</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="account-login section">
        <div class="container">
            <div class="row" >
                <div class="col-lg-3">
                    @include('website.customer.sidebar-menu')
                </div>
                <div class="col-lg-9">
                    <div class="card card-body">
                        <p class="text-center text-success py-3">{{session('message')}}</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Order Id</th>
                                    <th>Order Date</th>
                                    <th>Order Status</th>
                                    <th>Order Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                 <tr>
                                     <td>{{$loop->iteration}}</td>
                                     <td>{{$order->id}}</td>
                                     <td>{{$order->order_date}}</td>
                                     <td>{{$order->order_status}}</td>
                                     <td>{{$order->order_total}}</td>
                                     <td>
                                         <a href="">Detail</a>
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


@endsection

