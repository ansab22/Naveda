<div class=" flex flex-col lg:flex-row items-center justify-between gap-10">

    {{-- Left Content --}}
    <div class="w-full lg:w-1/2 flex flex-col gap-3 lg:gap-6">

        {{-- Badge --}}
        <span class="inline-block px-3 lg:px-4 md:px-3 py-1 text-[10px] md:text-[8px] lg:text-[13px] font-medium text-gray-500 bg-[#f5f4f0] rounded-full w-fit">
            Welcome to Eldera
        </span>

        {{-- Title --}}
        <h1 class="text-[28px] md:text-[38px] lg:text-6xl text-gray-900  leading-tight">
            Leading the Charge<br>in Advanced<br>Nursing Care
        </h1>

        {{-- Paragraph --}}
        <p class="text-gray-600 text-[10px] md:text-xs lg:text-base">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>
            Ut elit tellus luctus nec mattis, pulvinar.
        </p>

        {{-- Button & Text --}}
        <div class="flex flex-col sm:flex-row sm:items-center gap-4">
            <a href="#"
                class="px-4 py-2 md:px-6 md:py-3 rounded-full bg-indigo-100 font-medium hover:bg-[#f5f4f0] text-[10px] lg:text-sm transition-colors duration-700 ease-in-out w-fit">
                Get In Touch
            </a>
        </div>

        {{-- Features --}}
        <div class="flex flex-wrap gap-3 lg:gap-6 pt-2 lg:pt-4">
            <div class="flex items-center gap-2 text-[10px] lg:text-sm font-semibold text-gray-800">
                <i class="fa-solid fa-circle-check text-green-300"></i> Professional Doctors
            </div>
            <div class="flex items-center gap-2 text-[10px] lg:text-sm font-semibold text-gray-800">
                <i class="fa-solid fa-circle-check text-green-300"></i> Professional Doctors
            </div>
            <div class="flex items-center gap-2 text-[10px] lg:text-sm font-semibold text-gray-800">
                <i class="fa-solid fa-circle-check text-green-300"></i> Professional Doctors
            </div>
        </div>
    </div>

    {{-- Right Image --}}
    <div class="w-full lg:w-1/2 relative   flex justify-center lg:justify-end items-center">
        <div class="bg-[#f5f4f0] pt-5 px-8 rounded-[20px]">
            <img src="/images/hero.png" alt="Nurse and patient" class="w-full max-w-sm mx-auto" />

            {{-- Overlay Card --}}
            <div
                class="absolute bottom-10 left-21 bg-white rounded-xl shadow-md px-3 py-1 md:px-4 md:py-3 flex items-center gap-3 w-fit text-sm">
                <div
                    class="bg-green-900 text-white p-2 rounded-full flex items-center justify-center text-sm md:text-xl leading-none">
                    <i class="fa-solid fa-house"></i>
                </div>
                <div>
                    <p class="text-gray-800 font-medium text-[10px] md:text-sm">Revolutionizing healthcare,</p>
                    <p class="text-gray-600 text-[10px] md:text-sm">one patient at a time</p>
                </div>
            </div>
        </div>
    </div>
</div>