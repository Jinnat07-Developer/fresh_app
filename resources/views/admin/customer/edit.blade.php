@extends('admin.master')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Customer Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Edit</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Customer</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- row -->
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Customer Form</h3>
                </div>
                <div class="card-body bg-cyan">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('customer.update',['id'=>$customer->id])}} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="customerName" class="col-md-4 form-label">Customer Name</label>
                            <div class="col-md-8">
                                <input class="form-control" id="customerName" value="{{$customer->name}}" type="text" name="name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-4 form-label">Customer Email</label>
                            <div class="col-md-8">
                                <input class="form-control" id="email" value="{{$customer->email}}" type="email" name="email">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="mobile" class="col-md-4 form-label">Customer Mobile</label>
                            <div class="col-md-8">
                                <input class="form-control" id="mobile" placeholder="Enter your mobile" type="number" value="{{$customer->mobile}}" name="mobile">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="address" class="col-md-4 form-label">Customer Address</label>
                            <div class="col-md-8">
                                <textarea class="form-control"  type="text" name="address">{{$customer->address}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="mobile" class="col-md-4 form-label">Customer NID</label>
                            <div class="col-md-8">
                                <input class="form-control" id="nid" type="number" value="{{$customer->nid}}" name="nid">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="dob" class="col-md-4 form-label">Customer Date-of-birth</label>
                            <div class="col-md-8">
                                <input class="form-control" id="dob"  type="text" value="{{$customer->date_of_birth}}" name="date_of_birth">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="bg" class="col-md-4 form-label">Customer Blood-group</label>
                            <div class="col-md-8">
                                <input class="form-control" id="bg"  type="text" value="{{$customer->blood_group}}" name="blood_group">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="district" class="col-md-4 form-label">Customer district</label>
                            <div class="col-md-8">
                                <input class="form-control" id="district"  type="text" value="{{$customer->district}}" name="district">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="status" class="col-md-4 form-label">Customer Status</label>
                            <div class="col-md-8">
                                <label><input type="radio" id="status" value="1" name="status" {{$customer->status == 1 ? 'checked' :' '}}>Published</label>
                                <label><input type="radio" id="status" value="0" name="status" {{$customer->status == 0 ? 'checked' :' '}}>UnPublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update customer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection



