@extends('admin.master')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Sub Category Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Manage</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Sub Category</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Sub Category Info</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">SL NO</th>
                                <th class="wd-15p border-bottom-0">Category Name</th>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-15p border-bottom-0">Description</th>
                                <th class="wd-20p border-bottom-0">Image</th>
                                <th class="wd-15p border-bottom-0">Status</th>
                                <th class="wd-10p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sub_categories as $sub_category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$sub_category->category_id}}</td>
                                    <td>{{$sub_category->name}}</td>
                                    <td>{{$sub_category->description}}</td>
                                    <td><img src="{{asset($sub_category->image)}}" alt="" height="50" width="50"></td>
                                    <td>{{$sub_category->status}}</td>
                                    <td>
                                        <a href="{{route('subCategory.edit',['id'=>$sub_category->id])}}" class="btn btn-success btn sm">
                                            <i class="fa fa-edit">Edit</i>
                                        </a>
                                        <a href="{{route('subCategory.delete',['id'=>$sub_category->id])}}" class="btn btn-info btn sm" onclick="return confirm('Are you sure?');">
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

