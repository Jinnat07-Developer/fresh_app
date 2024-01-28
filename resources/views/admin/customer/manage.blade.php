@extends('admin.master')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Customer Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Manage</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Customer</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">All Customer Info</h3>
                </div>
                <div class="card-body bg-blue-light">
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">SL NO</th>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-15p border-bottom-0">Mobile</th>
                                <th class="wd-20p border-bottom-0">Email</th>
                                <th class="wd-20p border-bottom-0">Address</th>
                                <th class="wd-20p border-bottom-0">NID</th>
                                <th class="wd-20p border-bottom-0">Date of Birth</th>
                                <th class="wd-20p border-bottom-0">Blood Group</th>
                                <th class="wd-20p border-bottom-0">District</th>
                                <th class="wd-15p border-bottom-0">Status</th>
                                <th class="wd-10p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                             @foreach($customers as $customer)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->mobile}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->address}}</td>
                                    <td>{{$customer->nid}}</td>
                                    <td>{{$customer->date_of_birth}}</td>
                                    <td>{{$customer->blood_group}}</td>
                                    <td>{{$customer->district}}</td>
                                    <td>{{$customer->status}}</td>
                                    <td>
                                        <a href="{{route('customer.edit',['id'=>$customer->id])}}" class="btn btn-success btn sm">
                                            <i class="fa fa-edit">Edit</i>
                                        </a>
                                        <a href="{{route('customer.delete',['id'=>$customer->id])}}" class="btn btn-info btn sm" onclick="return confirm('Are you sure?');">
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


