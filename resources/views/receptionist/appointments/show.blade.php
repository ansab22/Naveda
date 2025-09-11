@extends('receptionist.layout.layout')

@section('title', 'Appointments')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <h2 class="text-lg font-bold mb-4">Appointments</h2>

        <div class="overflow-x-auto w-full">
            <table class="table-auto w-full border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">Name</th>
                        <th class="px-4 py-2 border">Phone</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Date</th>
                        <th class="px-4 py-2 border">Service</th>
                        <th class="px-4 py-2 border">Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $appointment)
                    <tr class="text-center">
                        <td class="px-4 py-2 border">{{ $appointment->name }}</td>
                        <td class="px-4 py-2 border">{{ $appointment->phone }}</td>
                        <td class="px-4 py-2 border">{{ $appointment->email }}</td>
                        <td class="px-4 py-2 border">{{ $appointment->date }}</td>
                        <td class="px-4 py-2 border">{{ $appointment->service }}</td>
                        <td class="px-4 py-2 border">{{ $appointment->message }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection