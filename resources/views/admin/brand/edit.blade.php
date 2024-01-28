@extends('admin.master')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Brand Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Brand</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- row -->
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Brand Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('brand.update',['id'=>$brand->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="brandName" class="col-md-3 form-label">Brand Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="brandName" value="{{$brand->name}}" type="text" name="name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Brand Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control"  placeholder="Enter your description" name="description" type="text">{{$brand->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-md-3 form-label">Brand Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="image" placeholder="Enter your image" type="file" name="image">
                                <img src="{{asset($brand->image)}}" alt="" width="100" height="100">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="status" class="col-md-3 form-label">Brand Status</label>
                            <div class="col-md-9">
                                <label><input type="radio" id="status" value="1" name="status" {{$brand->status == 1 ? 'checked' :' '}}>Published</label>
                                <label><input type="radio" id="status" value="0" name="status" {{$brand->status == 0 ? 'checked' :' '}}>UnPublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update Brand</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection


