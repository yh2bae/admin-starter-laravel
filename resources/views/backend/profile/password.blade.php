@extends('layouts.backend.base')
@section('title', 'Profile')

@section('breadcrumb')
    <div class="col-12">
        <h2 class="content-header-title float-start mb-0">Profile</h2>
        <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <ul class="nav nav-pills mb-2">
        <!-- account -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.profile') }}">
                <i data-feather="user" class="font-medium-3 me-50"></i>
                <span class="fw-bold">Profile</span>
            </a>
        </li>
        <!-- security -->
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.profile.password') }}">
                <i data-feather="lock" class="font-medium-3 me-50"></i>
                <span class="fw-bold">Password</span>
            </a>
        </li>
    </ul>

    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Profile Details</h4>
        </div>
        <div class="card-body py-2 my-25">
            <!-- form -->
            <div class="row">
                <form action="{{ route('admin.profile.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-2">
                        <label for="password">Pasword</label>
                        <input type="password" class="form-control mt-1 @error('password') is-invalid @enderror"
                            id="password" name="password" value="" placeholder="*****************" autofocus>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Confirm Password</label>
                        <input type="password" class="form-control mt-1 @error('confirm_password') is-invalid @enderror"
                            id="confirm_password" name="confirm_password" placeholder="*****************" autofocus>
                        @error('confirm_password')
                            <span class="text-danger">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="d-grid col-lg-12 col-md-12 mb-1 mb-lg-0">
                        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Update
                            password</button>
                    </div>
                </form>
            </div>
            <!--/ form -->
        </div>
    </div>
@endsection
