@php
use App\Models\Content;

$services = Content::getData('home.service');

// Default data
$defaultBadge = 'Our Services';
$defaultHeading = 'Expertise and Compassion You Can Trust';
$defaultItems = [
["title" => "In-Home Care", "desc" => "Lorem ipsum dolor sit amet...", "icon" => "images/icon1.png", "link" => "#"],
["title" => "Assisted Living", "desc" => "Lorem ipsum dolor sit amet...", "icon" => "images/icon2.png", "link" => "#"],
["title" => "Memory Care", "desc" => "Lorem ipsum dolor sit amet...", "icon" => "images/icon3.png", "link" => "#"],
["title" => "Hospice Care", "desc" => "Lorem ipsum dolor sit amet...", "icon" => "images/icon4.png", "link" => "#"],
["title" => "Cardiac Care", "desc" => "Lorem ipsum dolor sit amet...", "icon" => "images/icon5.png", "link" => "#"],
["title" => "In-Call Ambulance", "desc" => "Lorem ipsum dolor sit amet...", "icon" => "images/icon6.png", "link" => "#"],
];

// Default icons
$defaultIcons = array_map(fn($item) => asset($item['icon']), $defaultItems);

// Use saved data or fallback to default
$badge = $services['badge'] ?? $defaultBadge;
$heading = $services['heading'] ?? $defaultHeading;
$items = $services['items'] ?? $defaultItems;
@endphp

<div class="py-5 lg:py-16 bg-white">
    <div class="">
        <div class="flex flex-col gap-6 justify-start items-start">
            <span class="inline-block px-3 lg:px-4 md:px-3 py-1 text-[10px] md:text-[8px] lg:text-[13px] font-medium text-gray-500 bg-[#f5f4f0] rounded-full w-fit">
                {{ $badge }}
            </span>
            <h1 class="text-[28px] md:text-[38px] lg:text-5xl text-gray-900 leading-tight">
                {{ $heading }}
            </h1>
        </div>

        <div class="mt-8 sm:mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
            @foreach($items as $i => $item)
            @php
            // Title & Description
            $title = $item['title'] ?? $defaultItems[$i]['title'];
            $desc = $item['desc'] ?? $defaultItems[$i]['desc'];
            $link = $item['link'] ?? $defaultItems[$i]['link'];

            // Icon
            $icon = $item['icon'] ?? null;
            $src = $defaultIcons[$i] ?? asset('images/default-icon.png');

            if ($icon && is_string($icon)) {
            if (str_starts_with($icon, 'http') || str_starts_with($icon, '/storage')) {
            $src = $icon;
            } else {
            $src = asset('storage/'.$icon);
            }
            }
            @endphp

            <div class="bg-[#f6f6f6] rounded-2xl p-6 sm:p-8">
                <div class="mb-6">
                    <img src="{{ $src }}" class="w-10 sm:w-12">
                </div>
                <h3 class="mt-4 md:mt-14 text-xl sm:text-2xl lg:text-[26px] font-light text-black">
                    {{ $title }}
                </h3>
                <p class="mt-2 text-xs sm:text-sm text-gray-500">
                    {{ $desc }}
                </p>
                @if(!empty($link))
                <a href="{{ $link }}" class="flex items-center text-xs sm:text-sm text-gray-800 font-medium transition group gap-2 mt-4">
                    Learn More
                    <span class="text-[#c4cffa] group-hover:text-black">
                        <i class="fa-solid fa-arrow-right text-[12px]"></i>
                    </span>
                </a>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>