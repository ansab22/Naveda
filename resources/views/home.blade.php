@extends('layouts.app')

@section('title', 'Nevada Memory Care | Assisted Living & In-Home Care')
@section('meta_description', 'Nevada Memory Care provides trusted in-home care, assisted living, memory
care, hospice, cardiac care & in-call ambulance services across Nevada.')

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