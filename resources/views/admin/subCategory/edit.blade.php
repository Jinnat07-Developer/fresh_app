@extends('admin.master')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Sub Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Sub Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- row -->
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit sub Category Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('subCategory.update',['id'=>$sub_category->id])}} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="categoryName" class="col-md-3 form-label">Category Name</label>
                            <div class="col-md-9">
                                <select class="form-control" name="category_id">
                                    <option value="">---Select option------- </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $sub_category->category_id ? 'selected' :' '}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="subCategoryName" class="col-md-3 form-label">Sub Category Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="subCategoryName" value="{{$sub_category->name}}" type="text" name="name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="description" class="col-md-3 form-label">Sub Category Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control"  placeholder="Enter your description" name="description" type="text">{{$sub_category->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-md-3 form-label">Sub Category Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="image" placeholder="Enter your image" type="file" name="image">
                                <img src="{{asset($sub_category->image)}}" alt="" height="100" width="100">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="status" class="col-md-3 form-label">Sub Category Status</label>
                            <div class="col-md-9">
                                <label><input type="radio" id="status" value="1" name="status" {{$sub_category->status == 1 ?'checked':''}}>Published</label>
                                <label><input type="radio" id="status" value="0" name="status"  {{$sub_category->status == 0 ?'checked':''}}>UnPublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update Sub Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection


