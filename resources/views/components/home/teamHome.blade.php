{{-- Dynamic Team Section for Frontend --}}
@php
// Get team data from database with fallback defaults
$teamData = \App\Models\Content::getData('home.teamHome');

// Default team data if nothing exists in database
$defaultTeam = [
'badge' => 'Our Team',
'heading' => 'Meet Our Professional Staffs',
'button_text' => 'Get In Touch',
'button_link' => '#',
'members' => [
[
'name' => 'James Jordan',
'position' => 'Senior Doctor',
'image' => 'images/d1.jpg',
'facebook' => '#',
'linkedin' => '#',
'phone' => '#'
],
[
'name' => 'Amanda Frost',
'position' => 'Senior Doctor',
'image' => 'images/d2.jpg',
'facebook' => '#',
'linkedin' => '#',
'phone' => '#'
],
[
'name' => 'Timothy Dean',
'position' => 'Senior Doctor',
'image' => 'images/d3.jpg',
'facebook' => '#',
'linkedin' => '#',
'phone' => '#'
],
[
'name' => 'Sarah Wilson',
'position' => 'Senior Doctor',
'image' => 'images/d4.jpg',
'facebook' => '#',
'linkedin' => '#',
'phone' => '#'
],
[
'name' => 'Michael Brown',
'position' => 'Senior Doctor',
'image' => 'images/d5.jpg',
'facebook' => '#',
'linkedin' => '#',
'phone' => '#'
],
[
'name' => 'Emily Davis',
'position' => 'Senior Doctor',
'image' => 'images/d6.jpg',
'facebook' => '#',
'linkedin' => '#',
'phone' => '#'
]
]
];

// Merge admin data with defaults
$team = array_merge($defaultTeam, $teamData ?: []);
$members = $team['members'] ?? $defaultTeam['members'];
@endphp

<div class="w-full lg:mt-[90px] mt-[20px] lg:mb-[50px] flex flex-col gap-10 sm:gap-16">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row gap-6 sm:gap-3 items-start sm:items-center justify-between">
        <div class="flex flex-col justify-start items-start gap-4 sm:gap-6">
            <span class="inline-block px-3 lg:px-4 md:px-3 py-1 text-[10px] md:text-[8px] lg:text-[13px] font-medium text-gray-500 bg-[#f5f4f0] rounded-full w-fit">
                {{ $team['badge'] }}
            </span>
            <h1 class="text-2xl sm:text-4xl md:text-5xl lg:text-[54px] text-gray-900 text-left leading-tight">
                {{ $team['heading'] }}
            </h1>
        </div>
        <a href="{{ $team['button_link'] }}"
            class="px-4 py-2 md:px-6 md:py-3 rounded-full bg-indigo-100 font-medium hover:bg-[#f5f4f0] text-[10px] lg:text-sm transition-colors duration-700 ease-in-out w-fit">
            {{ $team['button_text'] }}
        </a>
    </div>

    <!-- Team Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
        @foreach($members as $index => $member)
        <div class="relative">
            @php
            $imagePath = $member['image'] ?? null;

            // Use corresponding default image for each member position
            $defaultImages = [
            'images/d1.jpg', 'images/d2.jpg', 'images/d3.jpg',
            'images/d4.jpg', 'images/d5.jpg', 'images/d6.jpg'
            ];
            $defaultImage = $defaultImages[$index] ?? 'images/d1.jpg';

            // If image path is empty or not uploaded content, use default
            if (empty($imagePath) || !str_starts_with($imagePath, 'content/')) {
            $imageSrc = asset($defaultImage);
            } else {
            // Check if uploaded image exists
            if (file_exists(storage_path('app/public/' . $imagePath))) {
            $imageSrc = asset('storage/' . $imagePath);
            } else {
            $imageSrc = asset($defaultImage);
            }
            }
            @endphp

            <img src="{{ $imageSrc }}"
                alt="{{ $member['name'] ?? 'Team member' }}"
                class="rounded-2xl w-full object-cover h-[60vh] sm:h-[70vh]"
                onerror="this.src='{{ asset($defaultImage) }}'">

            <!-- Member Info Card -->
            <div class="absolute bottom-3 left-3 sm:left-6 bg-white shadow-md rounded-xl flex flex-col items-start space-y-2 sm:space-y-3 px-3 sm:px-4 py-3 sm:py-4 w-[90%]">
                <h3 class="text-lg sm:text-xl md:text-[27px] font-semibold">
                    {{ $member['name'] ?? 'Team Member' }}
                </h3>

                <div class="flex justify-between w-full items-center">
                    <p class="text-xs sm:text-sm text-gray-600">
                        {{ $member['position'] ?? 'Staff Member' }}
                    </p>

                    <div class="flex gap-3 sm:gap-4">

                        <a href="{{ $member['facebook'] }}" target="_blank"
                            class="text-[12px] sm:text-[14px] text-[#c4cffa] hover:text-black cursor-pointer transition-colors">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>



                        <a href="{{ $member['linkedin'] }}" target="_blank"
                            class="text-[14px] sm:text-[16px] text-[#c4cffa] hover:text-black cursor-pointer transition-colors">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>



                        <a href="tel:{{ $member['phone'] }}"
                            class="text-[12px] sm:text-[14px] text-[#c4cffa] hover:text-black cursor-pointer transition-colors">
                            <i class="fa-solid fa-phone"></i>
                        </a>

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>