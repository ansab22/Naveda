@php
use App\Models\Content;
$data = Content::getData('home.aboutHome');
@endphp

<div class="relative bg-white">
    <div class="py-10 lg:py-[90px] flex flex-col-reverse lg:grid lg:grid-cols-2 gap-6 md:gap-12 items-center">

        <!-- Left Image -->
        <div class="relative">
            <img src="{{ !empty($data['image']) ? asset('storage/'.$data['image']) : '/images/care.jpg' }}"
                alt="Doctor with patient"
                class="rounded-2xl w-full object-cover h-[100%] md:h-[90vh]">
            <!-- Small Card -->
            <div class="absolute bottom-3 left-6 bg-[#f5f4f0] shadow-md rounded-xl flex items-center space-x-3 px-4 py-6">
                <div class="flex -space-x-2">
                    <img src="/images/icon-img-1.jpg" class="w-6 h-6 lg:w-12 lg:h-12 rounded-full border-2 border-white">
                    <img src="/images/icon-img-2.jpg" class="w-6 h-6 lg:w-12 lg:h-12 rounded-full border-2 border-white">
                    <img src="/images/icon-img-3.jpg" class="w-6 h-6 lg:w-12 lg:h-12 rounded-full border-2 border-white">
                    <img src="/images/icon-img-4.jpg" class="w-6 h-6 lg:w-12 lg:h-12 rounded-full border-2 border-white">
                </div>
                <p class="text-gray-700 text-[10px] md:text-xs lg:text-sm font-medium">
                    Approved by more than <br> <span class="font-semibold">1000 patients</span>
                </p>
            </div>
        </div>

        <!-- Right Content -->
        <div class="space-y-3 lg:space-y-8">
            <span class="inline-block px-3 lg:px-4 md:px-3 py-1 text-[10px] md:text-[8px] lg:text-[13px] font-medium text-gray-500 bg-[#f5f4f0] rounded-full w-fit">
                {{ $data['badge'] ?? 'About Eldera' }}
            </span>

            <h1 class="text-[28px] md:text-[38px] lg:text-6xl text-gray-900  leading-tight">
                {{ $data['heading'] ?? 'Empowering Care for the Heart and Soul' }}
            </h1>

            {{-- Description allow HTML --}}
            <div class="text-gray-600 text-[10px] md:text-xs lg:text-base space-y-3">
                {!! $data['description'] ?? '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>' !!}
            </div>

            <!-- Buttons -->
            <div class="flex flex-wrap gap-4">
                <a href="{{ $data['button_link'] ?? '#' }}"
                    class="px-4 py-2 md:px-6 md:py-3 rounded-full bg-indigo-100 font-medium hover:bg-[#f5f4f0] text-[10px] lg:text-sm transition-colors duration-700 ease-in-out w-fit">
                    {{ $data['button_text'] ?? 'Get In Touch' }}
                </a>
                <a href="{{ $data['secondary_button_link'] ?? '#' }}"
                    class="flex items-center text-[10px] lg:text-sm text-gray-800 font-medium transition group gap-2">
                    {{ $data['secondary_button_text'] ?? 'Appointment' }}
                    <span class="text-[#c4cffa] group-hover:text-black">
                        <i class="fa-solid fa-arrow-right text-[10px] lg:text-sm"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>