@extends('admin.master')

@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">Courier Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">Courier</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Courier</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- row -->
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">Edit Courier</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form action="{{route('courier.update',$courier->id)}}" class="form-horizontal" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row mb-4">
                            <label for="courierName" class="col-md-3 form-label">Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="courierName" value="{{$courier->name}}" placeholder="Enter courier name" type="text" name="name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">Email</label>
                            <div class="col-md-9">
                                <input class="form-control" id="email" value="{{$courier->email}}" type="email" name="email">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="mobile" class="col-md-3 form-label">Mobile</label>
                            <div class="col-md-9">
                                <input class="form-control" id="mobile" value="{{$courier->mobile}}" type="number" name="mobile">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="cost" class="col-md-3 form-label">Courier cost</label>
                            <div class="col-md-9">
                                <input class="form-control" id="cost" value="{{$courier->cost}}" type="number" name="cost">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="address" class="col-md-3 form-label">Address</label>
                            <div class="col-md-9">
                                <textarea class="form-control"  placeholder="Enter address" name="address">{{$courier->address}}</textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Update Courier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

@endsection



