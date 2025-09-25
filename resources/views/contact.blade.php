@extends('layouts.app')

@section('title', 'Contact Nevada Memory Care | Senior Care in Nevada')
@section('meta_description', 'Get in touch with Nevada Memory Care in Nevada. Contact us today for details
on in-home care, assisted living, memory care, hospice, cardiac care & more.')

@section('content')

<div class="bg-white py-12 w-[85%] mx-auto">
    <x-about.hero-about
        title="Contact Us"
        breadcrumb='Home <i class="fa-solid fa-arrow-right text-[#c4cffa] px-2 lg:px-5 text-[10px] lg:text-[14px]"></i> COntact Us'
        image="/images/about2.jpg" />
    <x-contact.contactForm />
    @php
    $mapData = \App\Models\Content::getData('home.map');
    $mapLocation = $mapData['location'] ?? 'London Eye, London, UK';
    @endphp

    <iframe
        width="100%"
        height="450"
        style="border:0; border-radius:12px;"
        loading="lazy"
        allowfullscreen
        referrerpolicy="no-referrer-when-downgrade"
        class="h-[60vh]"
        src="https://www.google.com/maps?q={{ urlencode($mapLocation) }}&output=embed">
    </iframe>

    <x-home.faqHome />
</div>
<div class="lg:-mt-[120px]">
    <x-home.startedHome />
</div>
@endsection