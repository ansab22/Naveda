@extends('user.layout.layout')

@section('title', 'My Appointments')

@section('content')
<h2 class="text-xl font-semibold mb-4">My Appointments</h2>

@if($appointments->count() > 0)
<table class="w-full border-collapse border border-gray-200">
    <thead class="bg-gray-100">
        <tr>
            <th class="border p-2">Name</th>
            <th class="border p-2">Email</th>
            <th class="border p-2">Date</th>
            <th class="border p-2">Service</th>
            <th class="border p-2">Message</th>
            <th class="border p-2">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($appointments as $appointment)
        <tr class="text-center">
            <td class="border p-2">{{ $appointment->name }}</td>
            <td class="border p-2">{{ $appointment->email }}</td>
            <td class="border p-2">{{ $appointment->date }}</td>
            <td class="border p-2">{{ $appointment->service }}</td>
            <td class="border p-2">{{ $appointment->message ?? '-' }}</td>
            <td class="px-4 py-2 border">
                <span class="px-2 py-1 rounded 
        @if($appointment->status == 'approved') bg-green-200 text-green-800 
        @elseif($appointment->status == 'rejected') bg-red-200 text-red-800 
        @else bg-yellow-200 text-yellow-800 @endif">
                    {{ ucfirst($appointment->status) }}
                </span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p class="text-gray-500">No appointments booked yet.</p>
@endif
@endsection