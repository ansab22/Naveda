@extends('receptionist.layout.layout')

@section('title', 'Contacts')

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