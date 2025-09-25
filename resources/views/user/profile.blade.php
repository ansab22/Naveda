@extends('user.layout.layout')

@section('title', 'Edit Profile')

@section('content')
<div class="">
    <h2 class="text-xl font-semibold mb-4">Edit Profile</h2>
    @if(session('success'))
    <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
            @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium">New Password</label>
            <input type="password" name="password"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
            @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium">Confirm New Password</label>
            <input type="password" name="password_confirmation"
                class="w-full border rounded px-3 py-2 focus:ring focus:ring-blue-200">
        </div>

        <button type="submit"
            class="bg-[#1B8996] text-white px-4 py-2 rounded hover:bg-[#166a73]">
            Update Profile
        </button>
    </form>
</div>
@endsection