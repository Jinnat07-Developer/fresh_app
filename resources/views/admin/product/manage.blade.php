@extends('admin.master')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Manage</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Product Info</h3>
                </div>
                <div class="card-body bg-cyan-darkest">
                    <p class="text-muted">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">SL NO</th>
                                <th class="wd-15p border-bottom-0">Category Name</th>
                                <th class="wd-15p border-bottom-0">Sub Category</th>
                                <th class="wd-15p border-bottom-0">code</th>
                                <th class="wd-15p border-bottom-0">Stock amount</th>
                                <th class="wd-20p border-bottom-0">Image</th>
                                <th class="wd-15p border-bottom-0">Status</th>
                                <th class="wd-10p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->code}}</td>
                                    <td>{{$product->stock_amount}}</td>
                                    <td><img src="{{asset($product->image)}}" alt="" height="50" width="50"></td>
                                    <td>{{$product->status ==1?'checked' : ''}}</td>
                                    <td>
                                        <a href="{{route('product.edit',['id'=>$product->id])}} " class="btn btn-success btn sm">
                                            <i class="fa fa-edit">Edit</i>
                                        </a>
                                        <a href=" {{route('product.detail',['id'=>$product->id])}}" class="btn btn-info btn sm">
                                            <i class="fa fa-book">Detail</i>
                                        </a>
                                        <a href=" {{route('product.delete',['id'=>$product->id])}}" class="btn btn-info btn sm" onclick="return confirm('Are you sure?');">
                                            <i class="fa fa-trash">Delete</i>
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


