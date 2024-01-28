@extends('admin.master')

@section('body')
    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">courier Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Courier</a></li>
                <li class="breadcrumb-item active" aria-current="page">Manage Courier</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Courier Datatable</h3>
                </div>
                <div class="card-body">
                    <p class="text-center text-success">{{session('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">SL NO</th>
                                <th class="wd-15p border-bottom-0">Name</th>
                                <th class="wd-20p border-bottom-0">Email</th>
                                <th class="wd-15p border-bottom-0">Mobile</th>
                                <th class="wd-15p border-bottom-0">Cost</th>
                                <th class="wd-10p border-bottom-0">Address</th>
                                <th class="wd-25p border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($couriers as $courier)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$courier->name}}</td>
                                    <td>{{$courier->email}}</td>
                                    <td>{{$courier->mobile}}</td>
                                    <td>{{$courier->cost}}</td>
                                    <td>{{$courier->address}}</td>
                                    <td>
                                        <a href="{{route('courier.edit',$courier->id)}}" class="btn btn-success btn sm">
                                            <i class="fa fa-edit">Edit</i>
                                        </a>
                                        <form action="{{route('courier.destroy',$courier->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-info btn sm" onclick="return confirm('Are you sure to delete this?')">
                                                <i class="fa fa-trash">Delete</i>
                                            </button>
                                        </form>
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
