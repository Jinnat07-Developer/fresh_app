@extends('admin.master')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- row -->
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add Category Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="categoryName" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="categoryName" placeholder="Enter your Category Name" type="text" name="name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control"  placeholder="Enter your description" name="description" type="text"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-md-3 form-label">Category Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="image" placeholder="Enter your image" type="file" name="image">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="status" class="col-md-3 form-label">Category Status</label>
                            <div class="col-md-9">
                                <label><input type="radio" id="status" value="1" name="status">Published</label>
                                <label><input type="radio" id="status" value="0" name="status">UnPublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Create new Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection
