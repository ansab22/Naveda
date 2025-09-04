@extends('layouts.app')

@section('title', 'home')

@section('content')

<div class="bg-white py-12 w-[85%] mx-auto">
    <x-home.heroHome />
    <x-home.vedio />
    <x-home.aboutHome />
    <x-home.experience />
</div>
<x-home.mission />
<div class="bg-white py-12 w-[85%] mx-auto">
    <x-home.service />
    <x-home.appointmentHome />
</div>
<x-home.startedHome />
<div class="bg-white py-12 w-[85%] mx-auto">
    <x-home.teamHome />
    <x-home.faqHome />
</div>
@endsection