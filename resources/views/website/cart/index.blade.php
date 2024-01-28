@extends('website.master')

@section('body')


    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Cart</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="shopping-cart section">
        <div class="container">
            <h4 class="text-center text-muted">{{session('message')}}</h4>
            <div class="cart-list-head">
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Unit Price</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Sub total</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                @php($sum=0)
                @foreach($cart_products as $cart_product)
                <div class="cart-single-list">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href="product-details.html"><img src="{{asset($cart_product->options->image)}}" alt="#" height="100"></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <h5 class="product-name"><a href="product-details.html">{{$cart_product->name}}</a></h5>
                            <p class="product-des">
                                <span><em>Product Category:</em> {{$cart_product->options->category}}</span>
                                <span><em>Product Brand:</em>{{$cart_product->options->brand}}</span>
                            </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <form action="{{route('cart.update')}}" method="POST">
                                @csrf
                                <input type="hidden"  value="{{$cart_product->rowId}}" name="rowId" class="form-control bg-info"/>
                                <div class="input-group ">
                                    <input type="number"  value="{{$cart_product->qty}}" name="qty" class="form-control bg-info"/>
                                    <button type="submit" class="form-control bg-warning ">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{$cart_product->price}}</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{$cart_product->subtotal}}</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <a class="remove-item" onclick="return confirm('Are you sure?');" href="{{route('cart.remove',['rowId'=>$cart_product->rowId])}}"><i class="lni lni-close"></i></a>
                        </div>
                    </div>
                </div>
                    @php($sum = $sum+$cart_product->subtotal);
                @endforeach

            </div>
            <div class="row">
                <div class="col-12">

                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>{{$sum}}</span></li>
                                        <li>Tax Amount<span>{{$tax = $sum*0.15}}</span></li>
                                        <li>Shipping Cost<span>{{$shipping = 100}}</span></li>
                                        <li class="last">Total Payable<span>{{$sum + $tax + $shipping}}</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="{{route('product.checkout')}}" class="btn">Checkout</a>
                                        <a href="product-grids.html" class="btn btn-alt">Continue shopping</a>
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
