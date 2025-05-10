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
                                <h1>Forgot Password</h1>
                                <p>If you've forgotten your password, don't worry we'll help you reset it.
                                </p>
                                <form id="forgot-password-form" action="{{ route('admin.reset-password') }}" method="POST">
                                    @csrf
                                    <div class="field mb-3">
                                        <label for="fieldname">Email <sup>*</sup></label>
                                        <input type="email" id="email" name="email" class="form-control"
                                            autocomplete="true" value="{{ old('email') }}" />
                                        @error('email')
                                            <span class="error server-error">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button class="btn btn-secondary btn-block w-100 mt-4 mb-4" type="submit"
                                        id="login">
                                        Send password reset link
                                    </button>
                                    <div class="text-center">
                                        <span style="font-size: 14px;">Remember your login? <a class=""
                                                href={{ route('admin.login') }}>Login</a></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="copyright-text text-center">
                        <p>Ⓒ 2024 COMPANY.com. All rights reserved.</p>
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
@section('scripts')
    <script src="{{ asset('admin/assets/js/auth.js') }}"></script>
@endsection
<!-- Footer Include -->
