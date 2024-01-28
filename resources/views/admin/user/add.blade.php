@extends('admin.master')

@section('body')


    <!-- PAGE-HEADER -->
    <div class="page-header">
        <div>
            <h1 class="page-title">User Module</h1>
        </div>
        <div class="ms-auto pageheader-btn">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add User</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- row -->
    <div class="row row-deck">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-bottom">
                    <h3 class="card-title">User Form</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <form action="{{route('user.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-4">
                            <label for="userName" class="col-md-3 form-label">User Name</label>
                            <div class="col-md-9">
                                <input class="form-control" id="userName" placeholder="Enter user name" type="text" name="name">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="email" class="col-md-3 form-label">User Email</label>
                            <div class="col-md-9">
                                <input class="form-control" id="email" placeholder="Enter your email" type="email" name="email">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="mobile" class="col-md-3 form-label">User Mobile</label>
                            <div class="col-md-9">
                                <input class="form-control" id="mobile" placeholder="Enter mobile" type="number" name="mobile">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="password" class="col-md-3 form-label">User Password</label>
                            <div class="col-md-9">
                                <input class="form-control" id="password" placeholder="Enter password" type="password" name="password">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="image" class="col-md-3 form-label">User Image</label>
                            <div class="col-md-9">
                                <input class="form-control" id="image" placeholder="Enter image" type="file" name="profile_photo_path">
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Create New User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /row -->

@endsection


