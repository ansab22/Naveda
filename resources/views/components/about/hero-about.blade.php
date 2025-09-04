<div class="text-center pt-0 md:pt-5 lg:pt-14 flex gap-0 lg:gap-2 flex-col">
    <!-- Title -->
    <h3 class="text-[32px] md:text-[42px] lg:text-[54px] text-[#243a2e]">
        {{ $title }}
    </h3>

    <!-- Breadcrumb -->
    <p class="text-[#4b6557] font-medium text-[12px] lg:text-[14px] pt-2 md:pt-2">
        {!! $breadcrumb !!}
    </p>

    <!-- Image -->
    <img src="{{ $image }}"
        alt="{{ $title }}"
        class="w-full h-[55vh] md:h-[45vh] lg:h-[50vh] object-cover object-center mt-5 md:mt-10 lg:mt-14 border rounded-2xl ">
</div>