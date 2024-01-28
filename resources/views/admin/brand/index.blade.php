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
                <li class="breadcrumb-item active" aria-current="page">Add Brand</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- row -->
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Brand Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="brandName" class="col-md-3 form-label">Brand Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="brandName" placeholder="Enter your Brand Name" type="text" name="name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Brand Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control"  placeholder="Enter your description" name="description" type="text"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-md-3 form-label">Brand Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="image" placeholder="Enter your image" type="file" name="image">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="status" class="col-md-3 form-label">Brand Status</label>
                            <div class="col-md-9">
                                <label><input type="radio" id="status" value="1" name="status">Published</label>
                                <label><input type="radio" id="status" value="0" name="status">UnPublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Create new Brand</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection

