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
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <h2 class="text-lg font-bold mb-4">Appointments</h2>

        <!-- ✅ Table wrapper with fixed height & vertical scroll -->
        <div class="overflow-x-auto w-full">
            <div class="max-h-[500px] overflow-y-auto border border-gray-200 rounded-lg">
                <table class="table-auto w-full">
                    <thead class="bg-gray-100 sticky top-0 z-10">
                        <tr>
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 border">Phone</th>
                            <th class="px-4 py-2 border">Email</th>
                            <th class="px-4 py-2 border">Date</th>
                            <th class="px-4 py-2 border">Service</th>
                            <th class="px-4 py-2 border">Message</th>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($appointments as $appointment)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $appointment->name }}</td>
                            <td class="px-4 py-2">{{ $appointment->phone }}</td>
                            <td class="px-4 py-2">{{ $appointment->email }}</td>
                            <td class="px-4 py-2">{{ $appointment->date }}</td>
                            <td class="px-4 py-2">{{ $appointment->service }}</td>
                            <td class="px-4 py-2">{{ $appointment->message }}</td>
                            <td class="px-4 py-2">
                                <span class="px-1 py-1 rounded 
                                @if($appointment->status == 'approved') bg-green-200 text-green-800
                                @elseif($appointment->status == 'rejected') bg-red-200 text-red-800 
                                @else bg-yellow-200 text-yellow-800 @endif">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </td>
                            <td class="px-0 py-2 space-x-5 ">
                                <form action="{{ route('appointments.updateStatus', $appointment->id) }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="bg-red-800 text-black px-1 py-1 text-xs">Approve</button>
                                </form>
                                <form action="{{ route('appointments.updateStatus', $appointment->id) }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-black px-1 py-1 rounded-md text-xs">Reject</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection