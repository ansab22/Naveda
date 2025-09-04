@extends('layouts.app')

@section('title', 'Appointment')

@section('content')

<div class="bg-white py-12 w-[85%] mx-auto gap-20">
    <x-about.hero-about
        title="Our Appointment"
        breadcrumb='Home <i class="fa-solid fa-arrow-right text-[#c4cffa] px-2 lg:px-5 text-[10px] lg:text-[14px]"></i> Appointment'
        image="/images/appointment.jpg" />

    <x-home.appointmentHome />
    <div class="lg:pt-[120px]"></div>
    <x-home.service />
</div>

<x-home.startedHome />
@endsection