@extends('layouts.app')

@section('title', 'About Nevada Memory Care | Compassionate Senior Care')
@section('meta_description', 'Learn about Nevada Memory Care, a trusted provider of senior care in Nevada.
We specialize in assisted living, in-home support, memory care & hospice
services.')

@section('content')

<div class="bg-white py-12 w-[85%] mx-auto">
    <x-about.hero-about
        title="Gallery"
        breadcrumb='Home <i class="fa-solid fa-arrow-right text-[#c4cffa] px-2 lg:px-5 text-[10px] lg:text-[14px]"></i> Gallery'
        image="/images/first.webp" />
        <x-gallery.galleries/>
</div>


@endsection