@php
use App\Models\Content;
$about = Content::getData('home.aboutHome') ?? [];
@endphp

<div class="flex justify-center items-center h-[80vh] sm:h-[85vh] lg:h-[90vh] bg-fixed bg-cover bg-center bg-no-repeat mt-[0px] lg:mt-[120px]"
    style="background-image: url('{{ !empty($about['image']) ? asset('storage/'.$about['image']) : asset('images/vedio-img.jpg') }}');">

    <div
        class="space-y-6 sm:space-y-8 bg-[#f6f6f6] w-full sm:w-[40%] md:w-[90%] lg:w-[55%] mx-[25px] md:mx-auto flex flex-col justify-center items-center p-6 sm:p-6 lg:p-16 border rounded-2xl sm:rounded-3xl">

        <!-- Badge -->
        <span
            class="inline-block px-3 lg:px-4 md:px-3 py-1 text-[10px] md:text-[8px] lg:text-[13px] font-medium text-gray-500 bg-[#f5f4f0] rounded-full w-fit">
            {{ $about['badge'] ?? 'About Eldera' }}
        </span>

        <!-- Heading -->
        <h1 class="text-[28px] md:text-[38px] lg:text-5xl text-gray-900  leading-tight text-center">
            {{ $about['heading'] ?? 'Personalized Care, Influenced by Sophistication' }}
        </h1>

        <!-- Paragraph -->
        <p class="text-gray-600 text-[10px] md:text-xs lg:text-base text-center">
            {{ $about['description'] ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ullamcorper vehicula suscipit. Phasellus euismod dui lacinia.' }}
        </p>

        <!-- Buttons -->
        <div class="flex flex-wrap justify-center gap-4 pt-4">
            <a href="{{ $about['button_link'] ?? '#' }}"
                class="px-4 py-2 md:px-6 md:py-3 rounded-full bg-indigo-200 font-medium hover:bg-[#f5f4f0] text-[10px] lg:text-sm transition-colors duration-700 ease-in-out w-fit">
                {{ $about['button_text'] ?? 'Get In Touch' }}
            </a>
            <a href="{{ $about['secondary_button_link'] ?? '#' }}"
                class="flex items-center text-[10px] lg:text-sm text-gray-800 font-medium transition group gap-2">
                {{ $about['secondary_button_text'] ?? 'Appointment' }}
                <span class="text-[#c4cffa] group-hover:text-black">
                    <i class="fa-solid fa-arrow-right text-[12px] sm:text-[14px]"></i>
                </span>
            </a>
        </div>
    </div>
</div>