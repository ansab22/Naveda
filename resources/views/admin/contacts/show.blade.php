@extends('admin.layout.layout')

@section('title', 'Contacts')

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
            <div class="w-[100%] ">
                <h2 class="text-2xl font-bold mb-4">Contacts</h2>

                <table class="w-full border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 border">Phone</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $contact)
                        <tr class="text-center">
                            <td class="px-4 py-2 border">{{ $contact->name }}</td>
                            <td class="px-4 py-2 border">{{ $contact->phone }}</td>
                            <td class="px-4 py-2 border">{{ $contact->email }}</td>
                            <td class="px-4 py-2 border">{{ $contact->message }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection