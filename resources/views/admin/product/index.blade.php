@extends('admin.master')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Product Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Product</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- row -->
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Add product Form</h3>
                </div>
                <div class="card-body bg-orange-light">
                    <p class="text-muted">{{session('message')}}</p>
                    <form class="form-horizontal" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="categoryName" class="col-md-4 form-label">Category Name</label>
                            <div class="col-md-8">
                                <select class="form-control" name="category_id" onchange="getSubCategoryByCategory(this.value)">
                                    <option value="">---Select option------- </option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="subCategoryName" class="col-md-4 form-label" >Sub Category Name</label>
                            <div class="col-md-8">
                                <select class="form-control" name="sub_category_id" id="subCategoryId">
                                    <option value="">---Select option------- </option>
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}">{{$sub_category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="brandName" class="col-md-4 form-label">Brand Name</label>
                            <div class="col-md-8">
                                <select class="form-control" name="brand_id">
                                    <option value="">---Select option------- </option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="categoryName" class="col-md-4 form-label">Unit Name</label>
                            <div class="col-md-8">
                                <select class="form-control" name="unit_id">
                                    <option value="">---Select option------- </option>
                                    @foreach($units as $unit)
                                        <option value="{{$unit->id}}">{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="productName" class="col-md-4 form-label">Product Name</label>
                            <div class="col-md-8">
                                <input class="form-control" id="productName" placeholder="Enter your product Name" type="text" name="name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="productCode" class="col-md-4 form-label">Product Code</label>
                            <div class="col-md-8">
                                <input class="form-control" id="productCode" placeholder="Enter your product code" type="text" name="code">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="stockAmount" class="col-md-4 form-label">Stock Amount</label>
                            <div class="col-md-8">
                                <input class="form-control" id="stockAmount" placeholder="Enter stock amount" type="number" name="stock_amount">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="productPrice" class="col-md-4 form-label">Product Price</label>
                            <div class="col-md-8">
                                <div class="input-group">
                                    <label><input class="form-control" id="regularPrice" placeholder="Enter regular price" type="number" name="regular_price"></label>
                                    <label><input class="form-control" id="sellingPrice" placeholder="Enter selling price" type="number" name="selling_price"></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="longDescription" class="col-md-4 form-label">Long Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control" id="summernote" placeholder="Enter your description" name="long_description" type="text"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="shortDescription" class="col-md-4 form-label">Short  Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control"  placeholder="Enter your description" name="short_description" type="text"></textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-md-4 form-label">Product Image</label>
                            <div class="col-md-8">
                                <input class="form-control" id="image" placeholder="Enter your image" type="file" name="image">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="otherImage" class="col-md-4 form-label">Other Image</label>
                            <div class="col-md-8">
                                <input class="form-control" id="otherImage" placeholder="Enter  image" type="file" name="other_image[]" multiple/>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="status" class="col-md-4 form-label">Product Status</label>
                            <div class="col-md-8">
                                <label><input type="radio" id="status" value="1" name="status">Published</label>
                                <label><input type="radio" id="status" value="0" name="status">UnPublished</label>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Create new product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
@endsection


