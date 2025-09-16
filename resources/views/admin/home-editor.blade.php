@extends('layouts.app')
@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Home Page Editor</h1>

    @if(session('success'))
    <div class="p-3 bg-green-100 text-green-800 mb-4">{{ session('success') }}</div>
    @endif

    {{-- HERO SECTION --}}
    <section class="mb-10">
        <h2 class="text-xl font-semibold mb-3">Hero Section</h2>
        <form method="POST" action="{{ route('admin.home-editor.update') }}" enctype="multipart/form-data" class="space-y-3">
            @csrf
            <input type="hidden" name="key" value="home.heroHome">

            {{-- Badge --}}
            <label class="block font-medium">Badge</label>
            <input type="text" name="data[badge]"
                value="{{ $data['home.heroHome']['badge'] ?? '' }}"
                class="w-full border p-2 rounded">

            {{-- Title --}}
            <label class="block font-medium">Title</label>
            <input type="text" name="data[title]"
                value="{{ $data['home.heroHome']['title'] ?? '' }}"
                class="w-full border p-2 rounded">

            {{-- Subtitle --}}
            <label class="block font-medium">Subtitle</label>
            <textarea name="data[subtitle]" class="w-full border p-2 rounded">{{ $data['home.heroHome']['subtitle'] ?? '' }}</textarea>

            {{-- Button text --}}
            <label class="block font-medium">Button text</label>
            <input type="text" name="data[button_text]"
                value="{{ $data['home.heroHome']['button_text'] ?? '' }}"
                class="w-full border p-2 rounded">

            {{-- Button link --}}
            <label class="block font-medium">Button link</label>
            <input type="text" name="data[button_link]"
                value="{{ $data['home.heroHome']['button_link'] ?? '' }}"
                class="w-full border p-2 rounded">

            {{-- Overlay title --}}
            <label class="block font-medium">Overlay Title</label>
            <input type="text" name="data[overlay_title]"
                value="{{ $data['home.heroHome']['overlay_title'] ?? '' }}"
                class="w-full border p-2 rounded">

            {{-- Overlay subtitle --}}
            <label class="block font-medium">Overlay Subtitle</label>
            <input type="text" name="data[overlay_subtitle]"
                value="{{ $data['home.heroHome']['overlay_subtitle'] ?? '' }}"
                class="w-full border p-2 rounded">

            {{-- Image --}}
            <label class="block font-medium">Hero Image</label>
            <input type="file" name="image" class="w-full border p-2 rounded">
            @if(!empty($data['home.heroHome']['image']))
            <div class="mt-2">
                <img src="{{ asset('storage/'.$data['home.heroHome']['image']) }}"
                    alt="hero" style="max-width:250px" class="rounded shadow">
            </div>
            @endif

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                Save Hero Section
            </button>
        </form>

    </section>

    {{-- VIDEO SECTION --}}
    <section class="mb-10">
        <h2 class="text-xl font-semibold mb-3">Video Section</h2>
        <form method="POST" action="{{ route('admin.home-editor.update') }}" enctype="multipart/form-data" class="space-y-3">
            @csrf
            <input type="hidden" name="key" value="home.vedio">

            {{-- Embed URL --}}
            <label class="block font-medium">Video embed URL (YouTube/Vimeo)</label>
            <input type="text" name="data[embed]"
                value="{{ $data['home.vedio']['embed'] ?? '' }}"
                class="w-full border p-2 rounded">

            {{-- Thumbnail Image --}}
            <label class="block font-medium">Thumbnail image (optional)</label>
            <input type="file" name="image" class="w-full border p-2 rounded">

            @if(!empty($data['home.vedio']['image']))
            <div class="mt-2">
                <img src="{{ asset('storage/'.$data['home.vedio']['image']) }}"
                    alt="video thumbnail"
                    style="max-width:200px" class="rounded shadow">
            </div>
            @endif

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Save Video Section
            </button>
        </form>

    </section>

    {{-- ABOUT SECTION --}}
    <section class="mb-10">
        <h2 class="text-xl font-semibold mb-3">About Section</h2>
        <form method="POST" action="{{ route('admin.home-editor.update') }}" enctype="multipart/form-data" class="space-y-3">
            @csrf
            <input type="hidden" name="key" value="home.aboutHome">

            {{-- Badge --}}
            <label class="block font-medium">Badge</label>
            <input type="text" name="data[badge]"
                value="{{ $data['home.aboutHome']['badge'] ?? '' }}"
                class="w-full border p-2 rounded">

            {{-- Heading --}}
            <label class="block font-medium">Heading</label>
            <input type="text" name="data[heading]"
                value="{{ $data['home.aboutHome']['heading'] ?? '' }}"
                class="w-full border p-2 rounded">

            {{-- Description --}}
            <label class="block font-medium">Description / HTML</label>
            <textarea name="data[description]" rows="6" class="w-full border p-2 rounded">{{ $data['home.aboutHome']['description'] ?? '' }}</textarea>

            {{-- Button 1 --}}
            <label class="block font-medium">Primary Button Text</label>
            <input type="text" name="data[button_text]"
                value="{{ $data['home.aboutHome']['button_text'] ?? '' }}"
                class="w-full border p-2 rounded">

            <label class="block font-medium">Primary Button Link</label>
            <input type="text" name="data[button_link]"
                value="{{ $data['home.aboutHome']['button_link'] ?? '' }}"
                class="w-full border p-2 rounded">

            {{-- Button 2 --}}
            <label class="block font-medium">Secondary Button Text</label>
            <input type="text" name="data[secondary_button_text]"
                value="{{ $data['home.aboutHome']['secondary_button_text'] ?? '' }}"
                class="w-full border p-2 rounded">

            <label class="block font-medium">Secondary Button Link</label>
            <input type="text" name="data[secondary_button_link]"
                value="{{ $data['home.aboutHome']['secondary_button_link'] ?? '' }}"
                class="w-full border p-2 rounded">

            {{-- Image --}}
            <label class="block font-medium">Main Image</label>
            <input type="file" name="image" class="w-full border p-2 rounded">
            @if(!empty($data['home.aboutHome']['image']))
            <div class="mt-2">
                <img src="{{ asset('storage/'.$data['home.aboutHome']['image']) }}" alt="about" style="max-width:200px" class="rounded shadow">
            </div>
            @endif

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Save About Section
            </button>
        </form>

    </section>

    {{-- Experience --}}
    <section class="mb-10">
        <h2 class="text-xl font-semibold mb-3">Experience Stats</h2>
        <form method="POST" action="{{ route('admin.home-editor.update') }}">
            @csrf
            <input type="hidden" name="key" value="home.experience">

            @php
            $items = $data['home.experience']['items'] ?? [
            ["number" => 35, "suffix" => "+", "title" => "Years of Experience", "desc" => "Lorem ipsum dolor sit amet."],
            ["number" => 140, "suffix" => "", "title" => "Professional Staffs", "desc" => "Lorem ipsum dolor sit amet."],
            ["number" => 6.2, "suffix" => "K+", "title" => "Happy Patients", "desc" => "Lorem ipsum dolor sit amet."],
            ["number" => 99.9, "suffix" => "%", "title" => "Positive Reviews", "desc" => "Lorem ipsum dolor sit amet."]
            ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($items as $index => $item)
                <div class="p-4 border rounded-lg bg-gray-50 space-y-3">
                    <h3 class="font-semibold">Card {{ $index + 1 }}</h3>

                    <label class="block text-sm">Number</label>
                    <input type="text" name="data[items][{{ $index }}][number]"
                        value="{{ $item['number'] }}"
                        class="w-full border p-2 rounded">

                    <label class="block text-sm">Suffix</label>
                    <input type="text" name="data[items][{{ $index }}][suffix]"
                        value="{{ $item['suffix'] }}"
                        class="w-full border p-2 rounded">

                    <label class="block text-sm">Title</label>
                    <input type="text" name="data[items][{{ $index }}][title]"
                        value="{{ $item['title'] }}"
                        class="w-full border p-2 rounded">

                    <label class="block text-sm">Description</label>
                    <textarea name="data[items][{{ $index }}][desc]" rows="2"
                        class="w-full border p-2 rounded">{{ $item['desc'] }}</textarea>
                </div>
                @endforeach
            </div>

            <div class="mt-6">
                <button class="bg-blue-600 text-white px-4 py-2 rounded">Save Experience Stats</button>
            </div>
        </form>
    </section>




    <section class="mb-10">
        <h2 class="text-xl font-semibold mb-3">Mission Section</h2>
        <form method="POST" action="{{ route('admin.home-editor.update') }}" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            <input type="hidden" name="key" value="home.mission">

            {{-- Badge --}}
            <label class="block text-sm">Badge</label>
            <input type="text" name="data[badge]"
                value="{{ $data['home.mission']['badge'] ?? '' }}"
                class="w-full border p-2 rounded">

            {{-- Heading --}}
            <label class="block text-sm">Heading</label>
            <input type="text" name="data[heading]"
                value="{{ $data['home.mission']['heading'] ?? '' }}"
                class="w-full border p-2 rounded">

            {{-- Description --}}
            <label class="block text-sm">Description</label>
            <textarea name="data[description]" rows="3"
                class="w-full border p-2 rounded">{{ $data['home.mission']['description'] ?? '' }}</textarea>

            {{-- Items --}}
            @php
            $items = $data['home.mission']['items'] ?? [
            ["title" => "Improving lives through dedication and skill", "image" => ""],
            ["title" => "Excellence in nursing, every step of the way", "image" => ""],
            ["title" => "Inspired by elegance, driven by compassion", "image" => ""],
            ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($items as $index => $item)
                <div class="p-4 border rounded bg-gray-50 space-y-3">
                    <h3 class="font-semibold">Item {{ $index+1 }}</h3>

                    {{-- Title --}}
                    <label class="block text-sm">Title</label>
                    <input type="text" name="data[items][{{ $index }}][title]"
                        value="{{ $item['title'] }}"
                        class="w-full border p-2 rounded">

                    {{-- Image --}}
                    <label class="block text-sm">Image</label>
                    <input type="file" name="data[items][{{ $index }}][image]" class="w-full border p-2 rounded">
                    @if(!empty($item['image']))
                    <img src="{{ asset('storage/'.$item['image']) }}" class="w-16 mt-2 rounded">
                    @endif
                </div>
                @endforeach
            </div>

            <div>
                <button class="bg-blue-600 text-white px-4 py-2 rounded">Save Mission</button>
            </div>
        </form>
    </section>


    {{-- SERVICES SECTION --}}
    <section class="mb-10">
        <h2 class="text-xl font-semibold mb-3">Services Section</h2>
        <form method="POST" action="{{ route('admin.home-editor.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <input type="hidden" name="key" value="home.service">

            {{-- Header Content --}}
            <div class="p-4 border rounded bg-gray-50 space-y-3">
                <h3 class="font-semibold text-lg">Header Section</h3>

                {{-- Badge --}}
                <label class="block font-medium">Badge Text</label>
                <input type="text" name="data[badge]"
                    value="{{ $data['home.service']['badge'] ?? 'Our Services' }}"
                    class="w-full border p-2 rounded">

                {{-- Heading --}}
                <label class="block font-medium">Main Heading</label>
                <input type="text" name="data[heading]"
                    value="{{ $data['home.service']['heading'] ?? 'Expertise and Compassion You Can Trust' }}"
                    class="w-full border p-2 rounded">
            </div>

            {{-- Services Items --}}
            @php
            $services = $data['home.service']['items'] ?? [
            ["title" => "In-Home Care", "desc" => "Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "icon" => "", "link" => "#"],
            ["title" => "Assisted Living", "desc" => "Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "icon" => "", "link" => "#"],
            ["title" => "Memory Care", "desc" => "Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "icon" => "", "link" => "#"],
            ["title" => "Hospice Care", "desc" => "Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "icon" => "", "link" => "#"],
            ["title" => "Cardiac Care", "desc" => "Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "icon" => "", "link" => "#"],
            ["title" => "In-Call Ambulance", "desc" => "Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.", "icon" => "", "link" => "#"],
            ];
            @endphp

            <div class="space-y-6">
                <h3 class="text-lg font-semibold">Service Items</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($services as $index => $item)
                    <div class="p-4 border rounded bg-gray-50 space-y-3">
                        <h4 class="font-semibold">Service {{ $index + 1 }}</h4>

                        {{-- Icon Upload --}}
                        <label class="block text-sm font-medium">Service Icon</label>
                        <input type="file" name="data[items][{{ $index }}][icon]"
                            class="w-full border p-2 rounded" accept="image/*">

                        {{-- Show current icon if exists --}}
                        @if(!empty($item['icon']))
                        <div class="mt-2">
                            @php
                            // Handle different icon path formats
                            $iconPath = $item['icon'];
                            if (str_starts_with($iconPath, 'images/')) {
                            // Default public path
                            $iconSrc = asset($iconPath);
                            } elseif (str_starts_with($iconPath, 'content/')) {
                            // Uploaded to storage/content
                            $iconSrc = asset('storage/' . $iconPath);
                            } else {
                            // Already full path
                            $iconSrc = asset('storage/' . $iconPath);
                            }
                            @endphp
                            <img src="{{ $iconSrc }}" alt="Current icon"
                                class="w-12 h-12 object-contain rounded border">
                            <small class="text-gray-500">Current icon</small>
                        </div>
                        @endif

                        {{-- Title --}}
                        <label class="block text-sm font-medium">Service Title</label>
                        <input type="text" name="data[items][{{ $index }}][title]"
                            value="{{ $item['title'] ?? '' }}"
                            class="w-full border p-2 rounded">

                        {{-- Description --}}
                        <label class="block text-sm font-medium">Description</label>
                        <textarea name="data[items][{{ $index }}][desc]" rows="3"
                            class="w-full border p-2 rounded">{{ $item['desc'] ?? '' }}</textarea>

                        {{-- Link --}}
                        <label class="block text-sm font-medium">Service Link</label>
                        <input type="text" name="data[items][{{ $index }}][link]"
                            value="{{ $item['link'] ?? '#' }}"
                            class="w-full border p-2 rounded"
                            placeholder="e.g., /services/in-home-care or #">
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                    Save Services Section
                </button>
            </div>
        </form>
    </section>

    {{-- ABOUT SECTION --}}
    <section class="mb-10">
        <h2 class="text-xl font-semibold mb-3">About Section</h2>
        <form method="POST" action="{{ route('admin.home-editor.update') }}" enctype="multipart/form-data" class="space-y-3">
            @csrf
            <input type="hidden" name="key" value="home.aboutHome">

            {{-- Badge --}}
            <label class="block font-medium">Badge</label>
            <input type="text" name="data[badge]" value="{{ $data['home.aboutHome']['badge'] ?? '' }}"
                class="w-full border p-2 rounded">

            {{-- Heading --}}
            <label class="block font-medium">Heading</label>
            <input type="text" name="data[heading]" value="{{ $data['home.aboutHome']['heading'] ?? '' }}"
                class="w-full border p-2 rounded">

            {{-- Description --}}
            <label class="block font-medium">Description</label>
            <textarea name="data[description]" rows="4"
                class="w-full border p-2 rounded">{{ $data['home.aboutHome']['description'] ?? '' }}</textarea>

            {{-- Button 1 --}}
            <label class="block font-medium">Primary Button Text</label>
            <input type="text" name="data[button_text]" value="{{ $data['home.aboutHome']['button_text'] ?? '' }}"
                class="w-full border p-2 rounded">

            <label class="block font-medium">Primary Button Link</label>
            <input type="text" name="data[button_link]" value="{{ $data['home.aboutHome']['button_link'] ?? '' }}"
                class="w-full border p-2 rounded">

            {{-- Button 2 --}}
            <label class="block font-medium">Secondary Button Text</label>
            <input type="text" name="data[secondary_button_text]"
                value="{{ $data['home.aboutHome']['secondary_button_text'] ?? '' }}" class="w-full border p-2 rounded">

            <label class="block font-medium">Secondary Button Link</label>
            <input type="text" name="data[secondary_button_link]"
                value="{{ $data['home.aboutHome']['secondary_button_link'] ?? '' }}" class="w-full border p-2 rounded">

            {{-- Image --}}
            <label class="block font-medium">Background Image</label>
            <input type="file" name="image" class="w-full border p-2 rounded">
            @if(!empty($data['home.aboutHome']['image']))
            <div class="mt-2">
                <img src="{{ asset('storage/'.$data['home.aboutHome']['image']) }}" alt="about"
                    style="max-width:200px" class="rounded shadow">
            </div>
            @endif

            <button class="bg-blue-600 text-white px-4 py-2 rounded">
                Save About Section
            </button>
        </form>
    </section>

    {{-- TEAM SECTION --}}
    {{-- TEAM SECTION --}}
    <section class="mb-10">
        <h2 class="text-xl font-semibold mb-3">Team Section</h2>
        <form method="POST" action="{{ route('admin.home-editor.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <input type="hidden" name="key" value="home.teamHome">

            {{-- Header Content --}}
            <div class="p-4 border rounded bg-gray-50 space-y-3">
                <h3 class="font-semibold text-lg">Header Section</h3>

                {{-- Badge --}}
                <label class="block font-medium">Badge Text</label>
                <input type="text" name="data[badge]"
                    value="{{ $data['home.teamHome']['badge'] ?? 'Our Team' }}"
                    class="w-full border p-2 rounded">

                {{-- Heading --}}
                <label class="block font-medium">Main Heading</label>
                <input type="text" name="data[heading]"
                    value="{{ $data['home.teamHome']['heading'] ?? 'Meet Our Professional Staffs' }}"
                    class="w-full border p-2 rounded">

                {{-- Button Text --}}
                <label class="block font-medium">Button Text</label>
                <input type="text" name="data[button_text]"
                    value="{{ $data['home.teamHome']['button_text'] ?? 'Get In Touch' }}"
                    class="w-full border p-2 rounded">

                {{-- Button Link --}}
                <label class="block font-medium">Button Link</label>
                <input type="text" name="data[button_link]"
                    value="{{ $data['home.teamHome']['button_link'] ?? '#' }}"
                    class="w-full border p-2 rounded">
            </div>

            {{-- Team Members --}}
            @php
            $members = $data['home.teamHome']['members'] ?? [
            [
            "name" => "James Jordan",
            "position" => "Senior Doctor",
            "image" => "images/d1.jpg",
            "facebook" => "#",
            "linkedin" => "#",
            "phone" => "#"
            ],
            [
            "name" => "Amanda Frost",
            "position" => "Senior Doctor",
            "image" => "images/d2.jpg",
            "facebook" => "#",
            "linkedin" => "#",
            "phone" => "#"
            ],
            [
            "name" => "Timothy Dean",
            "position" => "Senior Doctor",
            "image" => "images/d3.jpg",
            "facebook" => "#",
            "linkedin" => "#",
            "phone" => "#"
            ],
            [
            "name" => "Sarah Wilson",
            "position" => "Senior Doctor",
            "image" => "images/d4.jpg",
            "facebook" => "#",
            "linkedin" => "#",
            "phone" => "#"
            ],
            [
            "name" => "Michael Brown",
            "position" => "Senior Doctor",
            "image" => "images/d5.jpg",
            "facebook" => "#",
            "linkedin" => "#",
            "phone" => "#"
            ],
            [
            "name" => "Emily Davis",
            "position" => "Senior Doctor",
            "image" => "images/d6.jpg",
            "facebook" => "#",
            "linkedin" => "#",
            "phone" => "#"
            ]
            ];
            @endphp

            <div class="space-y-6">
                <h3 class="text-lg font-semibold">Team Members</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($members as $index => $member)
                    <div class="p-4 border rounded bg-gray-50 space-y-3">
                        <h4 class="font-semibold">Member {{ $index + 1 }}</h4>

                        {{-- Name --}}
                        <label class="block text-sm font-medium">Name</label>
                        <input type="text" name="data[members][{{ $index }}][name]"
                            value="{{ $member['name'] ?? '' }}"
                            class="w-full border p-2 rounded">

                        {{-- Position --}}
                        <label class="block text-sm font-medium">Position</label>
                        <input type="text" name="data[members][{{ $index }}][position]"
                            value="{{ $member['position'] ?? '' }}"
                            class="w-full border p-2 rounded">

                        {{-- Current Image Display --}}
                        @if(!empty($member['image']))
                        <div class="mt-2">
                            @php
                            // Handle different image path formats for display
                            $imagePath = $member['image'];
                            $defaultImages = ['images/d1.jpg', 'images/d2.jpg', 'images/d3.jpg', 'images/d4.jpg', 'images/d5.jpg', 'images/d6.jpg'];
                            $defaultImage = $defaultImages[$index] ?? 'images/d1.jpg';

                            if (str_starts_with($imagePath, 'images/')) {
                            // Default public path
                            $imageSrc = asset($imagePath);
                            } elseif (str_starts_with($imagePath, 'content/')) {
                            // Uploaded to storage/content
                            $imageSrc = asset('storage/' . $imagePath);
                            // Check if file exists, fallback to default
                            if (!file_exists(storage_path('app/public/' . $imagePath))) {
                            $imageSrc = asset($defaultImage);
                            }
                            } else {
                            // Other storage paths
                            $storagePath = ltrim($imagePath, '/');
                            if (file_exists(storage_path('app/public/' . $storagePath))) {
                            $imageSrc = asset('storage/' . $storagePath);
                            } else {
                            $imageSrc = asset($defaultImage);
                            }
                            }
                            @endphp
                            <img src="{{ $imageSrc }}"
                                alt="Current photo"
                                class="w-20 h-20 object-cover rounded-lg border"
                                onerror="this.src='{{ asset($defaultImage) }}'">
                            <small class="text-gray-500 block">Current photo</small>
                        </div>
                        @endif

                        {{-- Image Upload --}}
                        <label class="block text-sm font-medium">Upload New Photo (Optional)</label>
                        <input type="file" name="data[members][{{ $index }}][image]"
                            class="w-full border p-2 rounded" accept="image/*">

                        {{-- Hidden field to preserve current image path --}}
                        <input type="hidden" name="data[members][{{ $index }}][current_image]"
                            value="{{ $member['image'] ?? '' }}">

                        <small class="text-gray-600">Leave empty to keep current photo</small>

                        {{-- Social Links --}}
                        <div class="grid grid-cols-1 gap-2">
                            <label class="block text-sm font-medium">Facebook URL</label>
                            <input type="text" name="data[members][{{ $index }}][facebook]"
                                value="{{ $member['facebook'] ?? '#' }}"
                                class="w-full border p-2 rounded text-sm">

                            <label class="block text-sm font-medium">LinkedIn URL</label>
                            <input type="text" name="data[members][{{ $index }}][linkedin]"
                                value="{{ $member['linkedin'] ?? '#' }}"
                                class="w-full border p-2 rounded text-sm">

                            <label class="block text-sm font-medium">Phone</label>
                            <input type="text" name="data[members][{{ $index }}][phone]"
                                value="{{ $member['phone'] ?? '#' }}"
                                class="w-full border p-2 rounded text-sm">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                    Save Team Section
                </button>
            </div>
        </form>
    </section>

    {{-- FAQ SECTION --}}
    <section class="mb-10">
        <h2 class="text-xl font-semibold mb-3">FAQ Section</h2>
        <form method="POST" action="{{ route('admin.home-editor.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <input type="hidden" name="key" value="home.faqHome">

            {{-- Header Content --}}
            <div class="p-4 border rounded bg-gray-50 space-y-3">
                <h3 class="font-semibold text-lg">Header Section</h3>

                {{-- Badge --}}
                <label class="block font-medium">Badge Text</label>
                <input type="text" name="data[badge]"
                    value="{{ $data['home.faqHome']['badge'] ?? 'FAQs' }}"
                    class="w-full border p-2 rounded">

                {{-- Heading --}}
                <label class="block font-medium">Main Heading</label>
                <input type="text" name="data[heading]"
                    value="{{ $data['home.faqHome']['heading'] ?? 'Frequently Asked Questions' }}"
                    class="w-full border p-2 rounded">
            </div>

            {{-- Image Section --}}
            <div class="p-4 border rounded bg-gray-50 space-y-3">
                <h3 class="font-semibold text-lg">Image Section</h3>

                {{-- Current Image Display --}}
                @php
                $currentImage = $data['home.faqHome']['image'] ?? 'images/faq.jpg';
                if (str_starts_with($currentImage, 'content/')) {
                $imageSrc = asset('storage/' . $currentImage);
                if (!file_exists(storage_path('app/public/' . $currentImage))) {
                $imageSrc = asset('images/faq.jpg');
                }
                } else {
                $imageSrc = asset($currentImage);
                }
                @endphp

                <div class="mt-2">
                    <img src="{{ $imageSrc }}"
                        alt="Current FAQ image"
                        class="w-32 h-32 object-cover rounded-lg border"
                        onerror="this.src='{{ asset('images/faq.jpg') }}'">
                    <small class="text-gray-500 block">Current FAQ Image</small>
                </div>

                {{-- Image Upload --}}
                <label class="block font-medium">Upload New Image (Optional)</label>
                <input type="file" name="image"
                    class="w-full border p-2 rounded" accept="image/*">
                <small class="text-gray-600">Leave empty to keep current image</small>
            </div>

            {{-- Contact Information --}}
            <div class="p-4 border rounded bg-gray-50 space-y-3">
                <h3 class="font-semibold text-lg">Contact Information (Card on Image)</h3>

                {{-- Phone --}}
                <label class="block font-medium">Phone Number</label>
                <input type="text" name="data[phone]"
                    value="{{ $data['home.faqHome']['phone'] ?? '+1 (234) 567 890 00' }}"
                    class="w-full border p-2 rounded">

                {{-- Email --}}
                <label class="block font-medium">Email Address</label>
                <input type="email" name="data[email]"
                    value="{{ $data['home.faqHome']['email'] ?? 'eldera@mails.com' }}"
                    class="w-full border p-2 rounded">
            </div>

            {{-- FAQ Items --}}
            @php
            $faqs = $data['home.faqHome']['faqs'] ?? [
            [
            "question" => "How long has your company been established?",
            "answer" => "Tailwind CSS is a utility-first CSS framework that helps you build modern UIs faster by using utility classes."
            ],
            [
            "question" => "What services do you provide?",
            "answer" => "We provide comprehensive healthcare services including general consultations, specialized treatments, and emergency care."
            ],
            [
            "question" => "Do you accept insurance?",
            "answer" => "Yes, we accept most major insurance plans. Please contact our office to verify your specific coverage."
            ],
            [
            "question" => "What are your operating hours?",
            "answer" => "We are open Monday through Friday from 8:00 AM to 6:00 PM, and Saturday from 9:00 AM to 4:00 PM."
            ],
            [
            "question" => "How can I schedule an appointment?",
            "answer" => "You can schedule an appointment by calling our office, using our online booking system, or visiting us in person."
            ],
            [
            "question" => "Do you offer emergency services?",
            "answer" => "Yes, we provide 24/7 emergency services. Please call our emergency hotline for immediate assistance."
            ]
            ];
            @endphp

            <div class="space-y-6">
                <h3 class="text-lg font-semibold">FAQ Questions & Answers</h3>
                <div class="space-y-4">
                    @foreach($faqs as $index => $faqItem)
                    <div class="p-4 border rounded bg-gray-50 space-y-3">
                        <h4 class="font-semibold">FAQ {{ $index + 1 }}</h4>

                        {{-- Question --}}
                        <label class="block text-sm font-medium">Question</label>
                        <input type="text" name="data[faqs][{{ $index }}][question]"
                            value="{{ $faqItem['question'] ?? '' }}"
                            class="w-full border p-2 rounded"
                            placeholder="Enter your question here...">

                        {{-- Answer --}}
                        <label class="block text-sm font-medium">Answer</label>
                        <textarea name="data[faqs][{{ $index }}][answer]"
                            rows="3"
                            class="w-full border p-2 rounded resize-none"
                            placeholder="Enter the answer here...">{{ $faqItem['answer'] ?? '' }}</textarea>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                    Save FAQ Section
                </button>
            </div>
        </form>
    </section>

    {{-- ABOUT ELDERA SECTION --}}
    <section class="mb-10">
        <h2 class="text-xl font-semibold mb-3">About Eldera Section</h2>
        <form method="POST" action="{{ route('admin.home-editor.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <input type="hidden" name="key" value="home.aboutEldera">

            {{-- Badge --}}
            <div class="p-4 border rounded bg-gray-50 space-y-3">
                <h3 class="font-semibold text-lg">Header Content</h3>

                <label class="block font-medium">Badge Text</label>
                <input type="text" name="data[badge]"
                    value="{{ $data['home.aboutEldera']['badge'] ?? 'About Eldera' }}"
                    class="w-full border p-2 rounded">

                {{-- Main Heading --}}
                <label class="block font-medium">Main Heading</label>
                <textarea name="data[heading]" rows="2"
                    class="w-full border p-2 rounded">{{ $data['home.aboutEldera']['heading'] ?? 'Empowering Care for the Heart and Soul' }}</textarea>

                {{-- First Paragraph --}}
                <label class="block font-medium">First Paragraph</label>
                <textarea name="data[first_paragraph]" rows="3"
                    class="w-full border p-2 rounded">{{ $data['home.aboutEldera']['first_paragraph'] ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ullamcorper vehicula suscipit. Phasellus euismod dui lacinia, venenatis magna non, pretium felis. Nulla velit turpis, congue nec elit sit amet, sodales feugiat neque.' }}</textarea>

                {{-- Second Paragraph --}}
                <label class="block font-medium">Second Paragraph</label>
                <textarea name="data[second_paragraph]" rows="3"
                    class="w-full border p-2 rounded">{{ $data['home.aboutEldera']['second_paragraph'] ?? 'Mauris in neque viverra, volutpat elit vitae, consequat arcu. Phasellus condimentum luctus turpis, sed mollis quam tempus eget. Vivamus non tellus varius, sollicitudin diam quis, sagittis libero.' }}</textarea>
            </div>

            {{-- Main Image --}}
            <div class="p-4 border rounded bg-gray-50 space-y-3">
                <h3 class="font-semibold text-lg">Main Image (Left Side)</h3>

                <label class="block font-medium">Main Image</label>
                <input type="file" name="image" class="w-full border p-2 rounded" accept="image/*">

                @php
                $mainImage = $data['home.aboutEldera']['image'] ?? '/images/about1.jpg';
                if (str_starts_with($mainImage, 'content/')) {
                $mainImageSrc = asset('storage/' . $mainImage);
                } else {
                $mainImageSrc = asset($mainImage);
                }
                @endphp

                <div class="mt-2">
                    <img src="{{ $mainImageSrc }}" alt="Main about image"
                        class="w-40 h-32 object-cover rounded-lg border"
                        onerror="this.src='{{ asset('/images/about1.jpg') }}'">
                    <small class="text-gray-500 block">Current main image</small>
                </div>
            </div>

            {{-- Secondary Image --}}
            <div class="p-4 border rounded bg-gray-50 space-y-3">
                <h3 class="font-semibold text-lg">Secondary Image (Right Side)</h3>

                <label class="block font-medium">Secondary Image</label>
                <input type="file" name="data[secondary_image]" class="w-full border p-2 rounded" accept="image/*">

                @php
                $secondaryImage = $data['home.aboutEldera']['secondary_image'] ?? '/images/about2.jpg';
                if (str_starts_with($secondaryImage, 'content/')) {
                $secondaryImageSrc = asset('storage/' . $secondaryImage);
                } else {
                $secondaryImageSrc = asset($secondaryImage);
                }
                @endphp

                <div class="mt-2">
                    <img src="{{ $secondaryImageSrc }}" alt="Secondary about image"
                        class="w-40 h-32 object-cover rounded-lg border"
                        onerror="this.src='{{ asset('/images/about2.jpg') }}'">
                    <small class="text-gray-500 block">Current secondary image</small>
                </div>
            </div>

            {{-- Testimonial Card --}}
            <div class="p-4 border rounded bg-gray-50 space-y-3">
                <h3 class="font-semibold text-lg">Testimonial Card (Floating on Main Image)</h3>

                <label class="block font-medium">Card Text Line 1</label>
                <input type="text" name="data[testimonial_text_1]"
                    value="{{ $data['home.aboutEldera']['testimonial_text_1'] ?? 'Approved by more than' }}"
                    class="w-full border p-2 rounded">

                <label class="block font-medium">Card Text Line 2</label>
                <input type="text" name="data[testimonial_text_2]"
                    value="{{ $data['home.aboutEldera']['testimonial_text_2'] ?? '1000 patients' }}"
                    class="w-full border p-2 rounded">
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                    Save About Eldera Section
                </button>
            </div>
        </form>
    </section>


    {{-- ABOUT SERVICES SECTION --}}
    <section class="mb-10">
        <h2 class="text-xl font-semibold mb-3">About Services Section</h2>
        <form method="POST" action="{{ route('admin.home-editor.update') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <input type="hidden" name="key" value="about.service">

            {{-- Header Content --}}
            <div class="p-4 border rounded bg-gray-50 space-y-3">
                <h3 class="font-semibold text-lg">Header Section</h3>

                {{-- Badge --}}
                <label class="block font-medium">Badge Text</label>
                <input type="text" name="data[badge]"
                    value="{{ $data['about.service']['badge'] ?? 'Our Services' }}"
                    class="w-full border p-2 rounded">

                {{-- Heading --}}
                <label class="block font-medium">Main Heading</label>
                <input type="text" name="data[heading]"
                    value="{{ $data['about.service']['heading'] ?? 'Pursuing Excellence with Refined Care' }}"
                    class="w-full border p-2 rounded">

                {{-- Description --}}
                <label class="block font-medium">Description</label>
                <textarea name="data[description]" rows="3"
                    class="w-full border p-2 rounded">{{ $data['about.service']['description'] ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.' }}</textarea>
            </div>

            {{-- Main Image --}}
            <div class="p-4 border rounded bg-gray-50 space-y-3">
                <h3 class="font-semibold text-lg">Background Image</h3>

                <label class="block font-medium">Background Image</label>
                <input type="file" name="image" class="w-full border p-2 rounded" accept="image/*">

                @php
                $mainImage = $data['about.service']['image'] ?? '/images/about-service-bg.jpg';
                if (!empty($mainImage) && str_starts_with($mainImage, 'content/')) {
                $mainImageSrc = asset('storage/' . $mainImage);
                } else {
                $mainImageSrc = $mainImage ? asset($mainImage) : asset('/images/about-service-bg.jpg');
                }
                @endphp

                @if(!empty($data['about.service']['image']))
                <div class="mt-2">
                    <img src="{{ $mainImageSrc }}" alt="Current background"
                        class="w-40 h-32 object-cover rounded-lg border">
                    <small class="text-gray-500 block">Current background image</small>
                </div>
                @endif
            </div>

            {{-- Service Items --}}
            @php
            $services = $data['about.service']['items'] ?? [
            [
            "title" => "Passion",
            "description" => "Lorem ipsum dolor sit amet, consec tetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis leo.",
            "icon" => "fa-solid fa-pencil",
            "image" => ""
            ],
            [
            "title" => "Community",
            "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.",
            "icon" => "fa-solid fa-users",
            "image" => ""
            ],
            [
            "title" => "Commitment",
            "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.",
            "icon" => "fa-solid fa-gear",
            "image" => ""
            ],
            [
            "title" => "Growth",
            "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.",
            "icon" => "fa-solid fa-chart-simple",
            "image" => ""
            ],
            [
            "title" => "Honesty",
            "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.",
            "icon" => "fa-solid fa-lock",
            "image" => ""
            ],
            [
            "title" => "Team Work",
            "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis.",
            "icon" => "fa-solid fa-user",
            "image" => ""
            ]
            ];
            @endphp

            <div class="space-y-6">
                <h3 class="text-lg font-semibold">Service Values (6 Items)</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($services as $index => $item)
                    <div class="p-4 border rounded bg-gray-50 space-y-3">
                        <h4 class="font-semibold">Value {{ $index + 1 }}</h4>

                        {{-- Title --}}
                        <label class="block text-sm font-medium">Title</label>
                        <input type="text" name="data[items][{{ $index }}][title]"
                            value="{{ $item['title'] ?? '' }}"
                            class="w-full border p-2 rounded">

                        {{-- Description --}}
                        <label class="block text-sm font-medium">Description</label>
                        <textarea name="data[items][{{ $index }}][description]" rows="3"
                            class="w-full border p-2 rounded">{{ $item['description'] ?? '' }}</textarea>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                    Save About Services Section
                </button>
            </div>
        </form>
    </section>

    {{-- FAQ ALL SECTIONS --}}
    <section class="mb-10">
        <h2 class="text-xl font-semibold mb-3">FAQ All Sections</h2>

        {{-- About Services FAQ --}}
        <div class="mb-8 p-6 border rounded-lg bg-gray-50">
            <h3 class="text-lg font-semibold mb-4 text-blue-600">About Services FAQ</h3>
            <form method="POST" action="{{ route('admin.home-editor.update') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="key" value="faq.aboutServices">

                {{-- Header Section --}}
                <div class="p-4 border rounded bg-white space-y-3">
                    <h4 class="font-medium">Header Settings</h4>

                    <label class="block text-sm font-medium">Badge Text</label>
                    <input type="text" name="data[badge]"
                        value="{{ $data['faq.aboutServices']['badge'] ?? 'FAQs' }}"
                        class="w-full border p-2 rounded">

                    <label class="block text-sm font-medium">Main Heading</label>
                    <input type="text" name="data[heading]"
                        value="{{ $data['faq.aboutServices']['heading'] ?? 'About Services' }}"
                        class="w-full border p-2 rounded">
                </div>

                {{-- FAQ Items --}}
                @php
                $aboutServicesFaqs = $data['faq.aboutServices']['faqs'] ?? [
                ["question" => "How long has your company been established?", "answer" => "Our company has been providing healthcare services for over 15 years, establishing ourselves as a trusted provider in the community."],
                ["question" => "What types of services do you offer?", "answer" => "We offer comprehensive healthcare services including primary care, specialty consultations, diagnostic services, and preventive care programs."],
                ["question" => "Are your staff members certified?", "answer" => "Yes, all our healthcare professionals are fully licensed and certified in their respective fields, with ongoing training to maintain the highest standards."],
                ["question" => "Do you accept walk-in appointments?", "answer" => "We accept both scheduled appointments and walk-ins, though we recommend scheduling to ensure minimal wait times."],
                ["question" => "What safety protocols do you follow?", "answer" => "We maintain strict safety protocols including sanitation procedures, equipment sterilization, and adherence to all healthcare regulations."],
                ["question" => "How do you ensure quality of care?", "answer" => "We have comprehensive quality assurance programs, regular staff training, and patient feedback systems to continuously improve our services."]
                ];
                @endphp

                <div class="space-y-4">
                    <h4 class="font-medium">FAQ Questions & Answers (Minimum 6)</h4>
                    @for($i = 0; $i < 6; $i++)
                        <div class="p-4 border rounded bg-white space-y-3">
                        <h5 class="font-medium text-sm">Question {{ $i + 1 }}</h5>

                        <label class="block text-xs font-medium">Question</label>
                        <input type="text" name="data[faqs][{{ $i }}][question]"
                            value="{{ $aboutServicesFaqs[$i]['question'] ?? '' }}"
                            class="w-full border p-2 rounded text-sm"
                            placeholder="Enter question here...">

                        <label class="block text-xs font-medium">Answer</label>
                        <textarea name="data[faqs][{{ $i }}][answer]" rows="3"
                            class="w-full border p-2 rounded text-sm resize-none"
                            placeholder="Enter answer here...">{{ $aboutServicesFaqs[$i]['answer'] ?? '' }}</textarea>
                </div>
                @endfor
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Save About Services FAQ
        </button>
        </form>
</div>

{{-- About Payment FAQ --}}
<div class="mb-8 p-6 border rounded-lg bg-gray-50">
    <h3 class="text-lg font-semibold mb-4 text-green-600">About Payment FAQ</h3>
    <form method="POST" action="{{ route('admin.home-editor.update') }}" class="space-y-4">
        @csrf
        <input type="hidden" name="key" value="faq.aboutPayment">

        {{-- Header Section --}}
        <div class="p-4 border rounded bg-white space-y-3">
            <h4 class="font-medium">Header Settings</h4>

            <label class="block text-sm font-medium">Badge Text</label>
            <input type="text" name="data[badge]"
                value="{{ $data['faq.aboutPayment']['badge'] ?? 'FAQs' }}"
                class="w-full border p-2 rounded">

            <label class="block text-sm font-medium">Main Heading</label>
            <input type="text" name="data[heading]"
                value="{{ $data['faq.aboutPayment']['heading'] ?? 'About Payment' }}"
                class="w-full border p-2 rounded">
        </div>

        {{-- FAQ Items --}}
        @php
        $aboutPaymentFaqs = $data['faq.aboutPayment']['faqs'] ?? [
        ["question" => "What payment methods do you accept?", "answer" => "We accept cash, credit cards, debit cards, bank transfers, and most major insurance plans for your convenience."],
        ["question" => "Do you offer payment plans?", "answer" => "Yes, we offer flexible payment plans for eligible patients to help make healthcare more accessible and affordable."],
        ["question" => "Is insurance verification required?", "answer" => "We recommend verifying your insurance coverage before your visit to understand your benefits and any potential out-of-pocket costs."],
        ["question" => "When is payment due?", "answer" => "Payment is typically due at the time of service, though we can discuss alternative arrangements based on your specific situation."],
        ["question" => "Do you provide itemized bills?", "answer" => "Yes, we provide detailed, itemized statements for all services rendered to help you understand your charges and for insurance purposes."],
        ["question" => "What if I can't afford treatment?", "answer" => "We offer various financial assistance programs and can work with you to find affordable solutions for your healthcare needs."]
        ];
        @endphp

        <div class="space-y-4">
            <h4 class="font-medium">FAQ Questions & Answers (Minimum 6)</h4>
            @for($i = 0; $i < 6; $i++)
                <div class="p-4 border rounded bg-white space-y-3">
                <h5 class="font-medium text-sm">Question {{ $i + 1 }}</h5>

                <label class="block text-xs font-medium">Question</label>
                <input type="text" name="data[faqs][{{ $i }}][question]"
                    value="{{ $aboutPaymentFaqs[$i]['question'] ?? '' }}"
                    class="w-full border p-2 rounded text-sm"
                    placeholder="Enter question here...">

                <label class="block text-xs font-medium">Answer</label>
                <textarea name="data[faqs][{{ $i }}][answer]" rows="3"
                    class="w-full border p-2 rounded text-sm resize-none"
                    placeholder="Enter answer here...">{{ $aboutPaymentFaqs[$i]['answer'] ?? '' }}</textarea>
        </div>
        @endfor
</div>

<button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
    Save About Payment FAQ
</button>
</form>
</div>

{{-- Other Questions FAQ --}}
<div class="mb-8 p-6 border rounded-lg bg-gray-50">
    <h3 class="text-lg font-semibold mb-4 text-purple-600">Other Questions FAQ</h3>
    <form method="POST" action="{{ route('admin.home-editor.update') }}" class="space-y-4">
        @csrf
        <input type="hidden" name="key" value="faq.otherQuestions">

        {{-- Header Section --}}
        <div class="p-4 border rounded bg-white space-y-3">
            <h4 class="font-medium">Header Settings</h4>

            <label class="block text-sm font-medium">Badge Text</label>
            <input type="text" name="data[badge]"
                value="{{ $data['faq.otherQuestions']['badge'] ?? 'FAQs' }}"
                class="w-full border p-2 rounded">

            <label class="block text-sm font-medium">Main Heading</label>
            <input type="text" name="data[heading]"
                value="{{ $data['faq.otherQuestions']['heading'] ?? 'Other Questions' }}"
                class="w-full border p-2 rounded">
        </div>

        {{-- FAQ Items --}}
        @php
        $otherQuestionsFaqs = $data['faq.otherQuestions']['faqs'] ?? [
        ["question" => "What are your operating hours?", "answer" => "We are open Monday through Friday from 8:00 AM to 6:00 PM, Saturday from 9:00 AM to 4:00 PM, and closed on Sundays."],
        ["question" => "Do you offer emergency services?", "answer" => "Yes, we provide 24/7 emergency consultation services. Please call our emergency hotline for immediate assistance."],
        ["question" => "How can I schedule an appointment?", "answer" => "You can schedule appointments by calling our office, using our online booking system, or visiting us in person during business hours."],
        ["question" => "Do you provide home visits?", "answer" => "Yes, we offer home visit services for patients who are unable to come to our facility, subject to availability and medical requirements."],
        ["question" => "What should I bring to my first appointment?", "answer" => "Please bring a valid ID, insurance cards, list of current medications, and any relevant medical records from previous healthcare providers."],
        ["question" => "How far in advance should I book?", "answer" => "We recommend booking at least 1-2 weeks in advance for routine appointments, though we always try to accommodate urgent medical needs."]
        ];
        @endphp

        <div class="space-y-4">
            <h4 class="font-medium">FAQ Questions & Answers (Minimum 6)</h4>
            @for($i = 0; $i < 6; $i++)
                <div class="p-4 border rounded bg-white space-y-3">
                <h5 class="font-medium text-sm">Question {{ $i + 1 }}</h5>

                <label class="block text-xs font-medium">Question</label>
                <input type="text" name="data[faqs][{{ $i }}][question]"
                    value="{{ $otherQuestionsFaqs[$i]['question'] ?? '' }}"
                    class="w-full border p-2 rounded text-sm"
                    placeholder="Enter question here...">

                <label class="block text-xs font-medium">Answer</label>
                <textarea name="data[faqs][{{ $i }}][answer]" rows="3"
                    class="w-full border p-2 rounded text-sm resize-none"
                    placeholder="Enter answer here...">{{ $otherQuestionsFaqs[$i]['answer'] ?? '' }}</textarea>
        </div>
        @endfor
</div>

<button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">
    Save Other Questions FAQ
</button>
</form>
</div>
</section>

{{-- Pricing Packages --}}
<section class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Pricing Packages</h2>
    <form method="POST" action="{{ route('admin.home-editor.update') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <input type="hidden" name="key" value="home.pricing">

        {{-- Header fields --}}
        <div class="p-4 border rounded bg-gray-100 space-y-4">
            <h3 class="font-medium text-lg">Section Header</h3>

            <label class="block text-sm font-medium">Badge</label>
            <input type="text" name="data[badge]" value="{{ $data['home.pricing']['badge'] ?? 'Our Pricing' }}" class="w-full border p-2 rounded">

            <label class="block text-sm font-medium">Heading</label>
            <input type="text" name="data[heading]" value="{{ $data['home.pricing']['heading'] ?? 'Choose the Best Package' }}" class="w-full border p-2 rounded">

            <label class="block text-sm font-medium">Button Text</label>
            <input type="text" name="data[button][text]" value="{{ $data['home.pricing']['button']['text'] ?? 'Get In Touch' }}" class="w-full border p-2 rounded">

            <label class="block text-sm font-medium">Button Link</label>
            <input type="text" name="data[button][link]" value="{{ $data['home.pricing']['button']['link'] ?? '#' }}" class="w-full border p-2 rounded">
        </div>

        {{-- Packages --}}
        @php
        $pricingPackages = $data['home.pricing']['items'] ?? [];
        @endphp

        @foreach($pricingPackages as $i => $pkg)
        <div class="p-4 border rounded bg-gray-50 space-y-4">
            <h3 class="font-medium text-lg">Package {{ $i + 1 }}</h3>

            <label class="block text-sm font-medium">Price</label>
            <input type="text" name="data[items][{{ $i }}][price]" value="{{ $pkg['price'] ?? '' }}" class="w-full border p-2 rounded">

            <label class="block text-sm font-medium">Title</label>
            <input type="text" name="data[items][{{ $i }}][title]" value="{{ $pkg['title'] ?? '' }}" class="w-full border p-2 rounded">

            <label class="block text-sm font-medium">Description</label>
            <textarea name="data[items][{{ $i }}][desc]" class="w-full border p-2 rounded">{{ $pkg['desc'] ?? '' }}</textarea>

            <label class="block text-sm font-medium">Features (comma separated)</label>
            <input type="text" name="data[items][{{ $i }}][features]" value="{{ is_array($pkg['features']) ? implode(',', $pkg['features']) : '' }}" class="w-full border p-2 rounded">

            <label class="block text-sm font-medium">Button Text</label>
            <input type="text" name="data[items][{{ $i }}][button_text]" value="{{ $pkg['button_text'] ?? 'Get Started' }}" class="w-full border p-2 rounded">

            <label class="block text-sm font-medium">Button Link</label>
            <input type="text" name="data[items][{{ $i }}][button_link]" value="{{ $pkg['button_link'] ?? '#' }}" class="w-full border p-2 rounded">
        </div>
        @endforeach



        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Save Pricing Section
        </button>
    </form>
</section>


{{-- Google Map Section --}}
<section class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Google Map</h2>
    <form method="POST" action="{{ route('admin.home-editor.update') }}" class="space-y-6">
        @csrf
        <input type="hidden" name="key" value="home.map">

        <div class="p-4 border rounded bg-gray-50 space-y-4">
            <label class="block text-sm font-medium">Map Location (Address or Coordinates)</label>
            <input type="text" name="data[location]"
                value="{{ $data['home.map']['location'] ?? 'London Eye, London, UK' }}"
                class="w-full border p-2 rounded">

            <p class="text-xs text-gray-500">Example: <br>
                - <code>London Eye, London, UK</code><br>
                - <code>33.6844,73.0479</code>
            </p>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
            Save Map Location
        </button>
    </form>
</section>




</div>
@endsection