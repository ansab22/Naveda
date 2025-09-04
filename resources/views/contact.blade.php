@extends('layouts.app')

@section('title', 'Contact')

@section('content')

<div class="bg-white py-12 w-[85%] mx-auto">
    <x-about.hero-about
        title="Contact Us"
        breadcrumb='Home <i class="fa-solid fa-arrow-right text-[#c4cffa] px-2 lg:px-5 text-[10px] lg:text-[14px]"></i> COntact Us'
        image="/images/about2.jpg" />
    <x-contact.contactForm />
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19828.079082283617!2d-0.1246!3d51.5033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604b900b0b0e1%3A0xdda5d0a79babc9d6!2sLondon%20Eye!5e0!3m2!1sen!2suk!4v1693497642000!5m2!1sen!2suk"
        width="100%"
        height="450"
        style="border:0; border-radius:12px;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade "
        class="h-[60vh]">
    </iframe>
    <x-home.faqHome />
</div>
<div class="lg:-mt-[120px]">
    <x-home.startedHome />
</div>
@endsection