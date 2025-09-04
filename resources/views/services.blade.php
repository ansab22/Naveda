@extends('layouts.app')

@section('title', 'Services')

@section('content')

<div class="bg-white py-12 w-[85%] mx-auto">
    <x-about.hero-about
        title="Our Services"
        breadcrumb='Home <i class="fa-solid fa-arrow-right text-[#c4cffa] px-2 lg:px-5 text-[10px] lg:text-[14px]"></i> Services'
        image="/images/service1.jpg" />
    <x-home.service />
</div>

<x-home.startedHome />
<div class="bg-white py-12 w-[85%] mx-auto">
    <x-home.faqHome />
</div>
@endsection