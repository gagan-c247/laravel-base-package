<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $title }} | {{ config('app.name') }}</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.3/toastr.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css" />
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/sweetalert.css') }}" rel="stylesheet">
    @vite(['resources/admin/scss/style.scss']);
</head>

<body>
    <div class="loading-effect">
        <div class="spinner"></div>
    </div>
    <header>
        <nav class="navbar navbar-expand-lg h-100 px-3 py-0">
            <div class="d-none d-lg-block">
                <div class="brand-logo">
                    <a href="{{ route('admin.dashboard') }}">
                        <span class="logo-text">
                            <img src="{{ asset('admin/images/logo.svg') }}" class="light-logo" alt="brand-logo" />
                        </span>
                    </a>
                </div>
            </div>
            <!-- Toggler-icon -->
            <ul class="navbar-nav align-items-center m-0">
                <li class="nav-item nav-icon-hover-bg">
                    <a class="nav-link sidebartoggler" href="javascript:void(0)">
                        <img src="{{ asset('admin/images/toggle-icon-open.svg') }}" id="toggleIcon" alt="toggle-icon">
                    </a>
                </li>
            </ul>

            <div class="right-area">
                <ul class="navbar-nav flex-row mx-auto align-items-center justify-content-end">
                    {{-- <li class="nav-item notification">
                        <a class="nav-link" href="javascript:void(0)" id="drop2" aria-expanded="false">
                            <span class="iconify" data-icon="mdi:bell-notification" data-inline="false"></span>
                        </a>
                    </li> --}}

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="position-relative me-1">
                                <img class="img-profile img-profile-icon me-1 border-radius-1" width="40"
                                    src="{{ auth()->user()->userDetails?->profile_picture ? asset('storage/' . auth()->user()->userDetails->profile_picture) : asset('admin/images/profile-avatar.svg') }}" />
                                <span class="badge-online"></span>
                            </div>
                            <div class="lh-sm d-none d-lg-block">
                                <span class="">{{ auth()->user()->name }}</span><br />
                                <span class="text-secondary-black">{{ auth()->user()->email }}</span>
                            </div>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right box-shadow-1" aria-labelledby="userDropdown">
                            <a class="dropdown-item align-items-center py-2" href="{{ route('admin.profile') }}">
                                <img src="{{ asset('admin/images/user-icon.svg') }}" class="me-2" />
                                My Profile</a>

                            <a id="changePassword" class="dropdown-item align-items-center py-2"
                                href="javascript:void(0)"><img src="{{ asset('admin/images/password-icon.svg') }}"
                                    class="me-2" />
                                Change Password</a>
                            <div class="dropdown-divider mt-1"></div>
                            <a href="{{ route('admin.logout') }}"
                                class="dropdown-item d-flex align-items-center py-2 logout" data-href="">
                                <img src="{{ asset('admin/images/logout-icon.svg') }}" alt="/images\logout-icon.svg"
                                    class="me-2" />Logout</a>
                        </div>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
