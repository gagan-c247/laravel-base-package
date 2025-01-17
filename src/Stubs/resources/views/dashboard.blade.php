@extends('admin.dashboard.layout')
@section('content')
    <main class="body-wrapper">
        <div class="page-wrapper">
            <!-- Page-Title -->
            <div class="row justify-content-between align-items-center mb-3 pt-3 gy-4">
                <div class="col-md-4 col-12">
                    <h1 class="m-0">Dashboard</h1>
                </div>
            </div>
            <!-- Inner-wrapper -->
            <div class="dashboard-content mt-3">
                <div class="row g-3">
                    <div class="col-md-3 col-sm-6 col-12">
                        <a href="/admin/users">
                            <div class="card">
                                <div class="icon">
                                    <span class="menu-icon iconify" data-icon="mynaui:users-solid"></span>
                                </div>
                                <h5>Users</h5>
                                <h4>65,563</h4>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12">
                        <a href="/admin/blog">
                            <div class="card">
                                <div class="icon">
                                    <span class="menu-icon iconify" data-icon="carbon:blog"></span>
                                </div>
                                <h5>Blogs</h5>
                                <h4>65,563</h4>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12">
                        <a href="/admin/category">
                            <div class="card">
                                <div class="icon">
                                    <span class="menu-icon iconify"
                                        data-icon="material-symbols:category-outline-rounded"></span>
                                </div>
                                <h5>Categories</h5>
                                <h4>65,563</h4>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 col-12">
                        <a href="/admin/pages">
                            <div class="card">
                                <div class="icon">
                                    <span class="menu-icon iconify" data-icon="iconoir:multiple-pages-plus"></span>
                                </div>
                                <h5>Pages</h5>
                                <h4>65,563</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <a href="/admin/coupon">
                            <div class="card">
                                <div class="icon">
                                    <span class="menu-icon iconify" data-icon="material-symbols:sell"></span>
                                </div>
                                <h5>Coupons</h5>
                                <h4>65,563</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <a href="/admin/email">
                            <div class="card">
                                <div class="icon">
                                    <span class="menu-icon iconify" data-icon="mdi:email"></span>
                                </div>
                                <h5>Emails</h5>
                                <h4>65,563</h4>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
    </main>
@endsection
