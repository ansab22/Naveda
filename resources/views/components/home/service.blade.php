@php
use App\Models\Content;

$services = Content::getData('home.service');

// Default data
$defaultBadge = 'Our Services';
$defaultHeading = 'Expertise and Compassion You Can Trust';
$defaultItems = [
["title" => "In-Home Care", "desc" => "Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "icon" => "images/icon1.png", "link" => "#"],
["title" => "Assisted Living", "desc" => "Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "icon" => "images/icon2.png", "link" => "#"],
["title" => "Memory Care", "desc" => "Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "icon" => "images/icon3.png", "link" => "#"],
["title" => "Hospice Care", "desc" => "Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "icon" => "images/icon4.png", "link" => "#"],
["title" => "Cardiac Care", "desc" => "Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "icon" => "images/icon5.png", "link" => "#"],
["title" => "In-Call Ambulance", "desc" => "Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "icon" => "images/icon6.png", "link" => "#"],
];

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
            // Title & Description & Link
            $title = $item['title'] ?? ($defaultItems[$i]['title'] ?? 'Service Title');
            $desc = $item['desc'] ?? ($defaultItems[$i]['desc'] ?? 'Service description');
            $link = $item['link'] ?? ($defaultItems[$i]['link'] ?? '#');

            // Handle icon path properly
            $icon = $item['icon'] ?? null;
            $defaultIcon = $defaultItems[$i]['icon'] ?? 'images/default-icon.png';

            if ($icon) {
            // Check if it's an uploaded file (starts with content/)
            if (str_starts_with($icon, 'content/')) {
            $src = asset('storage/' . $icon);
            }
            // Check if it's a default public image (starts with images/)
            elseif (str_starts_with($icon, 'images/')) {
            $src = asset($icon);
            }
            // Handle other storage paths
            elseif (!str_starts_with($icon, 'http') && !str_starts_with($icon, '/storage')) {
            $src = asset('storage/' . ltrim($icon, '/'));
            }
            // Already full URL
            else {
            $src = $icon;
            }
            } else {
            // Use default icon
            $src = asset($defaultIcon);
            }
            @endphp

            <div class="bg-[#f6f6f6] rounded-2xl p-6 sm:p-8">
                <div class="mb-6">
                    <img src="{{ $src }}" alt="{{ $title }}" class="w-10 sm:w-12 h-10 sm:h-12 object-contain"
                        onerror="this.src='{{ asset('images/default-icon.png') }}'">
                </div>
                <h3 class="mt-4 md:mt-14 text-xl sm:text-2xl lg:text-[26px] font-light text-black">
                    {{ $title }}
                </h3>
                <p class="mt-2 text-xs sm:text-sm text-gray-500">
                    {{ $desc }}
                </p>
                <a href="{{ $link }}" class="flex items-center text-xs sm:text-sm text-gray-800 font-medium transition group gap-2 mt-4">
                    Learn More
                    <span class="text-[#c4cffa] group-hover:text-black">
                        <i class="fa-solid fa-arrow-right text-[12px]"></i>
                    </span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>