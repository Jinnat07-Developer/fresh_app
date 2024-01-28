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
                    <div class="card card-body ">
                        <p class="text-center text-success py-3">{{session('message')}}</p>
                        <form action="{{route('customer.update-password')}}" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <label class="col-md-3">Current Password</label>
                                <div class="col-md-9">
                                     <input type="password" class="form-control" placeholder="Enter your password" name="current_password"/>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3">New Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" placeholder="Enter your new password" name="new_password"/>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3">Confirm Password</label>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" placeholder="confirm password" name="confirm_password"/>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit" class="btn btn-info" value="update Password"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


