@php
use App\Models\Content;

// Get data from database with fallback to defaults
$serviceData = Content::getData('about.service');

// Default values
$defaults = [
'badge' => 'Our Values',
'heading' => 'Pursuing Excellence with Refined Care',
'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
'image' => '',
'items' => [
[
'title' => 'Passion',
'description' => 'Lorem ipsum dolor sit amet, consec tetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis leo.',
'icon' => 'fa-solid fa-pencil',
'image' => ''
],
[
'title' => 'Community',
'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.',
'icon' => 'fa-solid fa-users',
'image' => ''
],
[
'title' => 'Commitment',
'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.',
'icon' => 'fa-solid fa-gear',
'image' => ''
],
[
'title' => 'Growth',
'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.',
'icon' => 'fa-solid fa-chart-simple',
'image' => ''
],
[
'title' => 'Honesty',
'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.',
'icon' => 'fa-solid fa-lock',
'image' => ''
],
[
'title' => 'Team Work',
'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.',
'icon' => 'fa-solid fa-user',
'image' => ''
]
]
];

// Use database values or fallback to defaults
$badge = !empty($serviceData['badge']) ? $serviceData['badge'] : $defaults['badge'];
$heading = !empty($serviceData['heading']) ? $serviceData['heading'] : $defaults['heading'];
$description = !empty($serviceData['description']) ? $serviceData['description'] : $defaults['description'];
$backgroundImage = !empty($serviceData['image']) ? asset('storage/' . $serviceData['image']) : '';
$items = !empty($serviceData['items']) ? $serviceData['items'] : $defaults['items'];
@endphp

<div class="py-5 lg:py-16">
    <div class="flex flex-col gap-8 justify-start items-center">
        <span class="inline-block px-3 lg:px-4 md:px-3 py-1 text-[10px] md:text-[8px] lg:text-[13px] font-medium text-gray-500 bg-white rounded-full w-fit">
            {{ $badge }}
        </span>
        <h1 class="text-[28px] text-center md:text-[38px] lg:text-6xl text-gray-900 leading-tight">
            {!! nl2br(e($heading)) !!}
        </h1>
        <p class="text-gray-600 text-[10px] md:text-xs lg:text-base text-center w-full lg:w-[38%]">
            {{ $description }}
        </p>
    </div>

    <!-- Grid -->
    <div class="mt-8 sm:mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
        @foreach($items as $index => $item)
        @php
        // Use database values or fallback to defaults for each item
        $title = !empty($item['title']) ? $item['title'] : $defaults['items'][$index]['title'];
        $desc = !empty($item['description']) ? $item['description'] : $defaults['items'][$index]['description'];
        $icon = !empty($item['icon']) ? $item['icon'] : $defaults['items'][$index]['icon'];
        $itemImage = !empty($item['image']) ? asset('storage/' . $item['image']) : '';
        @endphp

        <!-- Service Card -->
        <div class="bg-white rounded-2xl p-6 sm:p-8">
            <div class="mb-6">
                @if(!empty($itemImage))
                <!-- Custom uploaded image -->
                <img src="{{ $itemImage }}"
                    alt="{{ $title }}"
                    class="w-12 h-12 lg:w-16 lg:h-16 object-contain bg-[#c4cffa] p-3 lg:p-4 rounded-full">
                @else
                <!-- FontAwesome icon -->
                <i class="{{ $icon }} bg-[#c4cffa] lg:p-4 p-3 text-[16px] lg:text-[22px] rounded-full"></i>
                @endif
            </div>

            <h3 class="mt-4 md:mt-[90px] text-xl sm:text-2xl lg:text-3xl font-light text-black">
                {{ $title }}
            </h3>

            <p class="mt-2 text-xs sm:text-base text-gray-500 w-full lg:w-[95%]">
                {{ $desc }}
            </p>
        </div>
        @endforeach
    </div>
</div>

@if(!empty($backgroundImage))
<style>
    /* Add background image if set */
    .service-section-bg {
        background-image: url('{{ $backgroundImage }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>

<script>
    // Apply background image class if image is set
    document.addEventListener('DOMContentLoaded', function() {
        const serviceSection = document.querySelector('.py-5.lg\\:py-16');
        if (serviceSection) {
            serviceSection.classList.add('service-section-bg');
        }
    });
</script>
@endif