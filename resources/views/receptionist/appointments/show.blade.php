    @extends('receptionist.layout.layout')

    @section('title', 'Appointments')

    @section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>

            <h2 class="text-lg font-bold mb-4">Appointments</h2>

            <!-- ✅ Mobile Cards -->
            <div class="space-y-4 md:hidden">
                @foreach($appointments as $appointment)
                <div class="border border-gray-200 rounded-lg p-4 shadow-sm bg-white flex-wrap">
                    <p><strong>Name:</strong> {{ $appointment->name }}</p>
                    <p><strong>Phone:</strong> {{ $appointment->phone }}</p>
                    <p>
                        <strong>Email:</strong>
                        <span class="break-words whitespace-normal max-w-full inline-block">
                            {{ $appointment->email }}
                        </span>
                    </p>
                    <p><strong>Date:</strong> {{ $appointment->date }}</p>
                    <p><strong>Service:</strong> {{ $appointment->service }}</p>
                    <p><strong>Message:</strong> {{ $appointment->message }}</p>
                    <p>
                        <strong>Status:</strong>
                        <span class="px-2 py-1 rounded 
                            @if($appointment->status == 'approved') bg-green-200 text-green-800
                            @elseif($appointment->status == 'rejected') bg-red-200 text-red-800
                            @else bg-yellow-200 text-yellow-800 @endif">
                            {{ ucfirst($appointment->status) }}
                        </span>
                    </p>
                    <div class="mt-3 flex space-x-2">

                        <form action="{{ route('appointments.updateStatus', $appointment->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="approved">
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md text-sm">Approve</button>
                        </form>
                        <form action="{{ route('appointments.updateStatus', $appointment->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="status" value="rejected">
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm">Reject</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- ✅ Desktop Table -->
            <div class="hidden md:block overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-100">
                                <tr class="text-center"> <!-- 👈 ye add kar diya -->
                                    <th class="px-4 py-2 text-sm font-medium text-gray-700">Name</th>
                                    <th class="px-4 py-2 text-sm font-medium text-gray-700">Phone</th>
                                    <th class="px-4 py-2 text-sm font-medium text-gray-700">Email</th>
                                    <th class="px-4 py-2 text-sm font-medium text-gray-700">Date</th>
                                    <th class="px-4 py-2 text-sm font-medium text-gray-700">Service</th>
                                    <th class="px-4 py-2 text-sm font-medium text-gray-700">Message</th>
                                    <th class="px-4 py-2 text-sm font-medium text-gray-700">Status</th>
                                    <th class="px-4 py-2 text-sm font-medium text-gray-700">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 text-center"> <!-- 👈 already center -->
                                @foreach($appointments as $appointment)
                                <tr>
                                    <td class="px-4 py-2">{{ $appointment->name }}</td>
                                    <td class="px-4 py-2">{{ $appointment->phone }}</td>
                                    <td class="px-4 py-2">{{ $appointment->email }}</td>
                                    <td class="px-4 py-2">{{ $appointment->date }}</td>
                                    <td class="px-4 py-2">{{ $appointment->service }}</td>
                                    <td class="px-4 py-2">{{ $appointment->message }}</td>
                                    <td class="px-4 py-2">
                                        <span class="px-2 py-1 rounded 
                    @if($appointment->status == 'approved') bg-green-200 text-green-800
                    @elseif($appointment->status == 'rejected') bg-red-200 text-red-800 
                    @else bg-yellow-200 text-yellow-800 @endif">
                                            {{ ucfirst($appointment->status) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 space-x-2">
                                        <form action="{{ route('appointments.updateStatus', $appointment->id) }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-md text-sm">Approve</button>
                                        </form>
                                        <form action="{{ route('appointments.updateStatus', $appointment->id) }}" method="POST" class="inline">
                                            @csrf
                                            <input type="hidden" name="status" value="rejected">
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm">Reject</button>
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
    </div>
    @endsection