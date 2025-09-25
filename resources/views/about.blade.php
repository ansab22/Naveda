@extends('layouts.app')

@section('title', 'About Nevada Memory Care | Compassionate Senior Care')
@section('meta_description', 'Learn about Nevada Memory Care, a trusted provider of senior care in Nevada.
We specialize in assisted living, in-home support, memory care & hospice
services.')

@section('content')

<div class="bg-white py-12 w-[85%] mx-auto">
    <x-about.hero-about
        title="About Us"
        breadcrumb='Home <i class="fa-solid fa-arrow-right text-[#c4cffa] px-2 lg:px-5 text-[10px] lg:text-[14px]"></i> About'
        image="/images/about.jpg" />
    <x-about.aboutNevada />
    <x-home.experience />
</div>
<div class="bg-[#f6f6f6] py-12 ">
    <div class="w-[85%] mx-auto">
        <x-about.service />
    </div>
</div>
<div class="-mt-[20px] lg:-mt-[120px]">
    <x-home.vedio />
</div>
<x-home.mission />
<div class="bg-[#f5f4f0] py-12 ">
    <div class="w-[85%] mx-auto">
        <x-home.teamHome />
    </div>
</div>
<div class="bg-white py-12 w-[85%] mx-auto">
    <x-home.faqHome />
</div>
@endsection