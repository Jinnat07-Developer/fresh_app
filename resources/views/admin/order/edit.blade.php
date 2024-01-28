
@extends('admin.master')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Order Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Order</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Order</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Order Edit Form</h3>
                </div>
                <div class="card-body bg-blue-lightest">
                    <form action="{{route('admin-order.update',['id'=>$order->id])}}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-md-3">Customer info</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{ isset($order->customer->name) ? $order->customer->name.'('.$order->customer->mobile.')' : ''}}"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3">Order Total</label>
                            <div class="col-md-9">
                                <input type="number" class="form-control" value="{{$order->order_total}}"/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3">Delivery Address</label>
                            <div class="col-md-9">
                                <textarea  class="form-control" name="delivery_address">{{$order->delivery_address}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3">Select Courier</label>
                            <div class="col-md-9">
                                <select class="form-control" name="courier_id">
                                    <option value="">--------Select Courier-------</option>
                                    <option value="1" @selected($order->courier_id ='1')>SA Poribahan</option>
                                    <option value="2" @selected($order->courier_id ='2')>Sundaraban</option>
                                    <option value="3" @selected($order->courier_id ='3')>Korotowa</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3">Select Order Status</label>
                            <div class="col-md-9">
                                <select class="form-control" name="order_status">
                                    <option value="">--------Select Order Status-------</option>
                                    <option value="Pending" @selected($order->order_status == 'Pending')>Pending</option>
                                    <option value="Processing" @selected($order->order_status =='Processing')>Processing</option>
                                    <option value="Complete" @selected($order->order_status == 'Complete')>Complete</option>
                                    <option value="Cancel" @selected($order->order_status == 'Cancel')>Cancel</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-md-3"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success" value="update order status"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
@endsection



