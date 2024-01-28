@extends('admin.master')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Order Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Manage</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Order</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Order Info</h3>
                </div>
                <div class="card-body bg-blue-lightest">
                    <p class="text-muted text-success">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">SL NO</th>
                                <th class="wd-20p border-bottom-0">Order id</th>
                                <th class="wd-15p border-bottom-0">Customer info</th>
                                <th class="wd-10p border-bottom-0">Order date</th>
                                <th class="wd-10p border-bottom-0">Order total</th>
                                <th class="wd-10p border-bottom-0">Order status</th>
                                <th class="wd-10p border-bottom-0">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$order->id}}</td>
                                    <td>{{ isset ($order->customer->name) ? $order->customer->name.'('.$order->customer->mobile.')' : ''}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->order_total}}</td>
                                    <td>{{$order->order_status}}</td>
                                    <td>
                                        <a href="{{route('admin-order.detail',['id'=>$order->id])}} " class="btn btn-info btn sm" title="View Order Detail">
                                            <i class="fa fa-book"></i>
                                        </a>
                                        <a href="{{route('admin-order.edit',['id'=>$order->id])}} " class="btn btn-success btn sm {{$order->order_status == 'Complete' ? 'disabled' :' '}}" title="View Order Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('admin-order.show-invoice',['id'=>$order->id])}} " class="btn btn-info btn sm" title="View Order Show invoice">
                                            <i class="fa fa-bookmark-o"></i>
                                        </a>
                                        <a href="{{route('admin-order.download-invoice',['id'=>$order->id])}} " class="btn btn-success btn sm" target="_blank" title="View Order Download invoice">
                                            <i class="fa fa-download"></i>
                                        </a>
                                        <a href="{{route('admin-order.delete',['id'=>$order->id])}}  " class="btn btn-info btn sm {{$order->order_status == 'Cancel' ? '' :' disabled'}}" onclick="return confirm('Are you sure?');" title="View Order Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
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
    <!-- End Row -->
@endsection


