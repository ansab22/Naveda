@extends('layouts.app')

@section('title', 'Nevada Memory Care | Frequently Asked Questions (FAQs)')
@section('meta_description', 'Find answers to common questions about Nevada Memory Care services in
Nevada, including in-home care, assisted living, memory care, hospice & more.')

@section('content')

<div class="bg-white py-12 w-[85%] mx-auto">
    <x-about.hero-about
        title="FAQs"
        breadcrumb='Home <i class="fa-solid fa-arrow-right text-[#c4cffa] px-2 lg:px-5 text-[10px] lg:text-[14px]"></i> FAQs'
        image="/images/faqs.jpg" />
    <x-faq.faqsAll />
</div>

@endsection