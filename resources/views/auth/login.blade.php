@extends('layouts.auth')
@section('title', 'Login Admin Panel')
@section('content')
    <div class="auth-wrapper auth-cover">
        <div class="auth-inner row m-0">
            <a class="brand-logo" href="/">
                <img src="{{ asset('backend/images/logo/logo.svg') }}" alt="logo" height="28px">
                <h2 class="brand-text text-primary ms-1">Login Admin</h2>
            </a>
            <!-- /Brand logo-->
            <!-- Left Text-->
            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid"
                        src="{{ asset('backend/images/pages/login-v2.svg') }}" alt="Login V2" /></div>
            </div>
            <!-- /Left Text-->
            <!-- Login-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                    <h2 class="card-title mb-1 font-weight-bold"> Welcome to Admin Panel! 👋 </h2>
                    <p class="card-text mb-2">Selamat Datang, Masuk Menggunakan Akun Kamu.</p>
                    <form action="{{ route('loginCheck') }}" method="POST">
                        @csrf
                        <input type="text" name="route" value="{{ $route }}" hidden>
                        <div class="mb-1">
                            <label class="form-label" for="username">Username</label>
                            <input class="form-control @error('username') is-invalid @enderror" id="username"
                                type="text" name="username" placeholder="Enter your username" aria-describedby="username"
                                autofocus="" tabindex="1" value="{{ old('username') }}" />
                            @error('username')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label><a
                                    href="auth-forgot-password-cover.html"></a>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input class="form-control form-control-merge @error('password') is-invalid @enderror"
                                    id="password" type="password" name="password" placeholder="············"
                                    aria-describedby="password" tabindex="2" />
                                @error('password')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                        </div>
                        <button class="btn btn-primary w-100" tabindex="4">Sign in</button>
                    </form>
                    <div class="divider my-2">
                        <div class="divider-text">Admin Panel</div>
                    </div>
                    <div class="auth-footer-btn d-flex justify-content-center">
                        <p style="font-size:10px;text-align:center">Build With <i class="text-danger"
                                data-feather="heart"></i> by <a href="#" target="_blank">Yudha Harsanto</a>
                        </p>
                    </div>
                </div>
            </div>
            <!-- /Login-->
        </div>
    </div>
@endsection
