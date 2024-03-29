@extends('website.master')

@section('body')


    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">
                            <li>
                                <h6 class="title" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">Order Checkout Information</h6>
                                <section class="checkout-steps-form-content collapse show" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <form action="{{route('confirm-order')}}" method="POST">
                                     @csrf
                                    <div class="row bg-info" >
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Full Name</label>
                                                <div class="row">
                                                    <div class="col-md-12 form-input form">
                                                        @if(isset($customer->name))
                                                        <input type="text" value="{{$customer->name}}" readonly placeholder="Full name" name="name">
                                                        @else
                                                            <input type="text" placeholder="Full name" name="name">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Email Address</label>
                                                <div class="form-input form">
                                                    @if(isset($customer->email))
                                                    <input type="email" value="{{$customer->email}}" readonly placeholder="Email Address" name="email">
                                                    @else
                                                        <input type="email"  placeholder="Email Address" name="email">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Phone Number</label>
                                                <div class="form-input form">
                                                   @if(isset($customer->mobile))
                                                    <input type="number" value="{{$customer->mobile}}" readonly placeholder="Phone Number" name="mobile">
                                                    @else
                                                        <input type="number" placeholder="Phone Number" name="mobile">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Delivery Address</label>
                                                <div class="form-input form">

                                                    <textarea  placeholder="Delivery Address" name="delivery_address"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Payment Method</label>
                                                <div class="">
                                                    <label class="me-4"> <input type="radio" value="cash" checked name="payment_method" />Cash on delivery</label>
                                                    <label> <input type="radio" value="online" name="payment_method"/>Online</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form button">
                                                <button class="btn" type="submit">Confirm Order</button>
                                            </div>
                                        </div>

                                    </div>
                                    </form>
                                </section>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table ">
                            <h5 class="title">Pricing Table</h5>
                            <div class="sub-total-price">
                                @php($sum=0)
                              @foreach(Cart::content() as $cartItem)
                                <div class="total-price">
                                    <p class="value">{{$cartItem->name}}:</p>
                                    <p class="price">BDT.{{$cartItem->subtotal}}</p>
                                </div>
                                  @php($sum = $sum + $cartItem->subtotal)
                                @endforeach
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Subotal Price:</p>
                                    <p class="price">{{$sum}}</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Tax amount:</p>
                                    <p class="price">{{$tax = $sum*0.15}}</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Shipping Cost:</p>
                                    <p class="price">{{$shipping = 100}}</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Total payable:</p>
                                    <p class="price">{{$order_total = $sum + $tax +$shipping}}</p>
                                </div>
                            </div>
                        </div>
                        <?php
                            Session::put('order_total', $order_total);
                            Session::put('tax_total', $tax);
                            Session::put('shipping_total', $shipping);
                        ?>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="{{asset('/')}}website/assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection
