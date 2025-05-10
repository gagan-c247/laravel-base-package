@extends('admin.auth.common.app')
@section('content')
    <main class="login-wrapper">
        <div class="container-flud h-100">
            <div class="row align-items-center h-100">
                <div class="col-md-6 col-lg-5 col-xl-4 mx-auto">
                    <div class="login">
                        <div class="login-card">
                            <div class="card-header">
                                <img src="{{ asset('admin/images/logo.svg') }}" class="light-logo" alt="brand-logo" />
                            </div>
                            <div class="login-form">
                                <h1>Login to your account</h1>
                                <p>Welcome back, Please log in to manage and oversee the platform.
                                </p>
                                <form id="login-form" autocomplete="off" class="{{ route('admin.login.post') }}"
                                    method="POST">
                                    @csrf
                                    <div class="field mb-3">
                                        <label for="fieldname">Email <sup>*</sup></label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            value="{{ old('email') }}" />
                                        @error('email')
                                            <span id="email-error" class="error">{{ $message }}</span>
                                        @enderror
                                        @if (session('error'))
                                            <span class="error server-error">{{ session('error') }}</span>
                                        @endif
                                    </div>
                                    <div class="field mb-3">
                                        <label for="fieldname">Password <sup>*</sup></label>
                                        <input type="password" name="password" id="password" class="form-control" />
                                        <span class="password-toggle-icon"><span class="iconify" id="eye-icon"
                                                data-icon="mdi:eye-off" data-inline="false"></span></span>
                                        @error('password')
                                            <span class="error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="field-group d-flex justify-content-between align-items-center">
                                        <div class="field">
                                            <div class="form-check form-check-inline">
                                                <input id="remember" type="checkbox" name="remember" />
                                                <label for="remember">Remember me</label>
                                            </div>
                                        </div>
                                        <a href="{{ route('admin.forgot-password') }}">Forgot Password?</a>
                                    </div>
                                    <button class="btn btn-secondary btn-block w-100 mt-4 mb-4" type="submit"
                                        id="login">
                                        Login
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="copyright-text text-center">
                        <p>Ⓒ {{ Carbon\Carbon::now()->year }}  {{ config('app.name') }}. All rights reserved.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 col-xl-4 ml-auto d-none d-lg-block">
                    <div class="banner-image">
                        <img src="{{ asset('admin/images/login-banner.webp') }}" class="img-fluid" alt="Login Banner" />
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
