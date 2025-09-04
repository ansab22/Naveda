@extends('layouts.app')

@section('title', 'Faqs')

@section('content')

<div class="bg-white py-12 w-[85%] mx-auto">
    <x-about.hero-about
        title="FAQs"
        breadcrumb='Home <i class="fa-solid fa-arrow-right text-[#c4cffa] px-2 lg:px-5 text-[10px] lg:text-[14px]"></i> FAQs'
        image="/images/faqs.jpg" />
    <x-faq.faqsAll />
</div>

@endsection