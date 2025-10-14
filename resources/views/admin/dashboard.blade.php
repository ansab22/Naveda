@extends('admin.layout.layout')

@section('title', 'Dashboards')

@push('styles')
<!-- BEGIN: Vendor CSS -->
<link rel="stylesheet" href="{{ asset('admin/app-assets/vendors/css/vendors.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/app-assets/vendors/css/charts/apexcharts.css') }}">
<link rel="stylesheet" href="{{ asset('admin/app-assets/vendors/css/extensions/tether-theme-arrows.css') }}">
<link rel="stylesheet" href="{{ asset('admin/app-assets/vendors/css/extensions/tether.min.css') }}">
<link rel="stylesheet" href="{{ asset('admin/app-assets/vendors/css/extensions/shepherd-theme-default.css') }}">
<!-- END: Vendor CSS -->

<!-- BEGIN: Theme CSS -->
<link rel="stylesheet" href="{{ asset('admin/app-assets/css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('admin/app-assets/css/bootstrap-extended.css') }}">
<link rel="stylesheet" href="{{ asset('admin/app-assets/css/colors.css') }}">
<link rel="stylesheet" href="{{ asset('admin/app-assets/css/components.css') }}">
<link rel="stylesheet" href="{{ asset('admin/app-assets/css/themes/dark-layout.css') }}">
<link rel="stylesheet" href="{{ asset('admin/app-assets/css/themes/semi-dark-layout.css') }}">
<!-- END: Theme CSS -->

<!-- BEGIN: Page CSS -->
<link rel="stylesheet" href="{{ asset('admin/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
<link rel="stylesheet" href="{{ asset('admin/app-assets/css/core/colors/palette-gradient.css') }}">
<link rel="stylesheet" href="{{ asset('admin/app-assets/css/pages/dashboard-analytics.css') }}">
<link rel="stylesheet" href="{{ asset('admin/app-assets/css/pages/card-analytics.css') }}">
<link rel="stylesheet" href="{{ asset('admin/app-assets/css/plugins/tour/tour.css') }}">
<!-- END: Page CSS -->

<!-- BEGIN: Custom CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
<!-- END: Custom CSS -->
@endpush

@push('scripts')
<!-- BEGIN: Vendor JS -->
<script src="{{ asset('admin/app-assets/vendors/js/vendors.min.js') }}"></script>
<!-- END: Vendor JS -->

<!-- BEGIN: Page Vendor JS -->
<script src="{{ asset('admin/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin/app-assets/vendors/js/extensions/tether.min.js') }}"></script>
<script src="{{ asset('admin/app-assets/vendors/js/extensions/shepherd.min.js') }}"></script>
<!-- END: Page Vendor JS -->

<!-- BEGIN: Theme JS -->
<script src="{{ asset('admin/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('admin/app-assets/js/core/app.js') }}"></script>
<script src="{{ asset('admin/app-assets/js/scripts/components.js') }}"></script>
<!-- END: Theme JS -->

<!-- BEGIN: Page JS -->
<script src="{{ asset('admin/app-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>
<!-- END: Page JS -->
@endpush


@section('content')



<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Dashboard Analytics Start -->
            <section id="dashboard-analytics">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card bg-analytics text-white">
                            <div class="card-content">
                                <div class="card-body text-center">
                                    <img src="/admin/app-assets/images/elements/decore-left.png" class="img-left" alt="
            card-img-lef../../..t">
                                    <img src="/admin/app-assets/images/elements/decore-right.png" class="img-right" alt="
            card-img-right">
                                    <div class="avatar avatar-xl bg-primary shadow mt-0">
                                        <div class="avatar-content">
                                            <i class="feather icon-award white font-large-1"></i>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <h1 class="mb-2 text-white">Congratulations, Admin</h1>
                                        <p class="m-auto w-75">You have done <strong>57.6%</strong> more sales today. Check your new badge in your profile.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Dashboard Analytics end -->

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection