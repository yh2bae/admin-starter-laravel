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
    {{-- <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.profile.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mt-1 mb-2">
                    <label for="name">Name</label>
                    <input type="text" class="form-control mt-1 @error('name') is-invalid @enderror" id="name"
                        name="name" value="{{ old('name', $data->name) }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="name">Username</label>
                    <input type="text" class="form-control mt-1 @error('username') is-invalid @enderror" id="username"
                        name="username" value="{{ old('username', $data->username) }}">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mb-2">
                    <label for="password">Pasword</label>
                    <input type="password" class="form-control mt-1 @error('password') is-invalid @enderror" id="password"
                        name="password" value="" placeholder="*****************" autofocus>
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
                        Profile</button>
                </div>
            </form>
        </div>
    </div> --}}
    <ul class="nav nav-pills mb-2">
        <!-- account -->
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.profile') }}">
                <i data-feather="user" class="font-medium-3 me-50"></i>
                <span class="fw-bold">Profile</span>
            </a>
        </li>
        <!-- security -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.profile.password') }}">
                <i data-feather="lock" class="font-medium-3 me-50"></i>
                <span class="fw-bold">Security</span>
            </a>
        </li>
    </ul>

    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Profile Details</h4>
        </div>
        <form action="{{ route('admin.profile.update', $data->id) }}" method="POST" enctype="multipart/form-data">
            <div class="card-body py-2 my-25">
                <!-- header section -->
                <div class="d-flex">
                    <a href="#" class="me-25">
                        <img src="{{ url($data->photo == null ? 'backend/images/avatars/8.png' : 'storage/upload/profile/' . $data->photo) }}"
                            id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100"
                            width="100" />
                    </a>
                    <!-- upload and reset button -->
                    <div class="d-flex align-items-end mt-75 ms-1">
                        <div>
                            <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75">Upload</label>
                            <input type="file" class=" @error('photo') is-invalid @enderror" id="account-upload"
                                name="photo" hidden accept="image/*" />
                            @error('photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <p class="mb-0">Allowed file types: png, jpg, jpeg.</p>
                        </div>
                    </div>
                    <!--/ upload and reset button -->
                </div>
                <!--/ header section -->

                <!-- form -->
                <div class="row">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-1 mb-2">
                        <label for="name">Name</label>
                        <input type="text" class="form-control mt-1 @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name', $data->name) }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="name">Username</label>
                        <input type="text" class="form-control mt-1 @error('username') is-invalid @enderror"
                            id="username" name="username" value="{{ old('username', $data->username) }}">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-grid col-lg-12 col-md-12 mb-1 mb-lg-0">
                        <button type="submit" class="btn btn-primary waves-effect waves-float waves-light">Update
                            Profile</button>
                    </div>
                </div>
                <!--/ form -->
            </div>
        </form>
    </div>
@endsection

@push('javascript')
    <script>
        $(function() {
            $('#account-upload').on('change', function(e) {
                var reader = new FileReader(),
                    files = e.target.files;
                reader.onload = function() {
                    if ($('#account-upload-img')) {
                        $('#account-upload-img').attr('src', reader.result);
                    }
                };
                reader.readAsDataURL(files[0]);
            });
        });
    </script>
@endpush
