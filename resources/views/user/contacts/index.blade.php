@extends('user.layout.layout')

@section('title', 'My Contact Messages')

@section('content')
<h2 class="text-xl font-semibold mb-4">My Contact Messages</h2>

@if($contacts->count() > 0)
<table class="w-full border-collapse border border-gray-200">
    <thead class="bg-gray-100">
        <tr>
            <th class="border p-2">Name</th>
            <th class="border p-2">Email</th>
            <th class="border p-2">Phone</th>
            <th class="border p-2">Message</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contacts as $contact)
        <tr>
            <td class="border p-2">{{ $contact->name }}</td>
            <td class="border p-2">{{ $contact->email }}</td>
            <td class="border p-2">{{ $contact->phone ?? '-' }}</td>
            <td class="border p-2">{{ $contact->message }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p class="text-gray-500">You haven’t submitted any contact messages yet.</p>
@endif
@endsection