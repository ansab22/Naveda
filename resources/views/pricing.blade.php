@extends('layouts.app')

@section('title', 'Nevada Memory Care | Affordable Senior Care Pricing')
@section('meta_description', 'Explore Nevada Memory Care pricing in Nevada. Learn affordable plans for in-
home care, assisted living, memory care, hospice, cardiac care & more services.')

@section('content')

<div class="bg-white pt-12 w-[85%] mx-auto border-b-2">
    <x-about.hero-about
        title="Pricing Plan"
        breadcrumb='Home <i class="fa-solid fa-arrow-right text-[#c4cffa] px-2 lg:px-5 text-[10px] lg:text-[14px]"></i> Pricing'
        image="/images/plan.jpg" />
    <x-pricing.plan />
</div>
    <div class="bg-white pb-12 w-[85%] mx-auto">
        <x-home.appointmentHome />
    </div>

@endsection