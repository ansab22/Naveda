@php
use App\Models\Content;

$pricing = Content::getData('home.pricing');
$items = $pricing['items'] ?? [
[
"price" => "$400",
"title" => "Basic Package",
"desc" => "Lorem ipsum dolor sit amet, consec tetur adipiscing elit.",
"features" => ["Personal Care Assistance", "Meal Preparation", "Medication Reminders", "Companionship"]
],
[
"price" => "$520",
"title" => "Standard Package",
"desc" => "Lorem ipsum dolor sit amet, consec tetur adipiscing elit.",
"features" => ["Personal Care Assistance", "Meal Preparation", "Medication Reminders", "Transportation Support"]
],
[
"price" => "$640",
"title" => "Premium Package",
"desc" => "Lorem ipsum dolor sit amet, consec tetur adipiscing elit.",
"features" => ["Personal Care Assistance", "Meal Preparation", "Medication Reminders", "24/7 Support"]
],
];

$badge = $pricing['badge'] ?? 'Our Pricing';
$heading = $pricing['heading'] ?? 'Choose the Best Package';
$button = $pricing['button'] ?? ['text' => 'Get In Touch', 'link' => '#'];
@endphp

<div class="w-full px-0 lg:mt-[90px] mt-[20px] lg:mb-[50px] flex flex-col gap-10 sm:gap-16">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row gap-6 sm:gap-3 items-start sm:items-center justify-between">
        <div class="flex flex-col justify-start items-start gap-4 sm:gap-6">
            <span class="inline-block px-3 lg:px-4 md:px-3 py-1 text-[10px] md:text-[8px] lg:text-[13px] font-medium text-gray-500 bg-[#f5f4f0] rounded-full w-fit">
                {{ $badge }}
            </span>
            <h1 class="text-2xl sm:text-4xl md:text-5xl lg:text-[54px] text-gray-900 text-left leading-tight">
                {{ $heading }}
            </h1>
        </div>
        <a href="{{ $button['link'] ?? '#' }}"
            class="px-4 py-2 md:px-6 md:py-3 rounded-full bg-indigo-100 font-medium hover:bg-[#f5f4f0] text-[10px] lg:text-sm transition-colors duration-700 ease-in-out w-fit">
            {{ $button['text'] ?? 'Get In Touch' }}
        </a>
    </div>

    <!-- Packages -->
    <div class="flex flex-col lg:flex-row w-full gap-10">
        @foreach($items as $item)
        <div class="bg-[#f6f6f6] shadow rounded-2xl w-full lg:w-[33.3%] p-6 lg:p-10 flex flex-col justify-between">

            <div class="flex items-baseline gap-2">
                <h2 class="text-4xl lg:text-6xl text-gray-900">{{ $item['price'] ?? '' }}</h2>
                <p class="text-[10px] lg:text-sm font-medium text-gray-800">/ Package</p>
            </div>

            <h2 class="mt-4 text-lg lg:text-2xl text-gray-900">{{ $item['title'] ?? '' }}</h2>
            <p class="mt-1 lg:mt-2 text-gray-500 text-[10px]">{{ $item['desc'] ?? '' }}</p>

            <hr class="my-6 border-gray-200">

            <h4 class="text-gray-900 font-medium mb-4 text-xs lg:text-sm">What's included?</h4>
            <ul class="space-y-3 text-gray-700">
                @foreach($item['features'] ?? [] as $feature)
                <div class="flex items-center gap-2 lg:gap-3">
                    <i class="fa-solid fa-check text-[#c4cffa] text-[10px]"></i>
                    <p class="text-xs lg:text-base">{{ $feature }}</p>
                </div>
                @endforeach
            </ul>

            <div class="mt-6">
                <a href="{{ $item['button_link'] ?? '#' }}"
                    class="w-full block text-center bg-indigo-100 text-black-800 text-xs lg:text-sm font-semibold py-3 rounded-full hover:bg-white duration-500">
                    {{ $item['button_text'] ?? 'Get Started' }}
                </a>
                <p class="mt-3 text-[10px] lg:text-xs text-gray-500">*Terms and Conditions apply</p>
            </div>
        </div>
        @endforeach
    </div>
</div>