@extends('layouts.app') {{-- or admin layout --}}

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
        <form method="POST" action="{{ route('admin.home-editor.update') }}" enctype="multipart/form-data" class="space-y-3">
            @csrf
            <input type="hidden" name="key" value="home.service">

            @php
            $services = $data['home.service']['items'] ?? [
            ["title" => "In-Home Care", "desc" => "Lorem ipsum...", "icon" => "images/icon1.png", "link" => "#"],
            ["title" => "Assisted Living", "desc" => "Lorem ipsum...", "icon" => "images/icon2.png", "link" => "#"],
            ["title" => "Memory Care", "desc" => "Lorem ipsum...", "icon" => "images/icon3.png", "link" => "#"],
            ["title" => "Hospice Care", "desc" => "Lorem ipsum...", "icon" => "images/icon4.png", "link" => "#"],
            ["title" => "Cardiac Care", "desc" => "Lorem ipsum...", "icon" => "images/icon5.png", "link" => "#"],
            ["title" => "In-Call Ambulance", "desc" => "Lorem ipsum...", "icon" => "images/icon6.png", "link" => "#"],
            ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($services as $index => $item)
                <div class="p-4 border rounded bg-gray-50 space-y-3">
                    <h3 class="font-semibold">Service {{ $index+1 }}</h3>

                    {{-- Icon --}}
                    <label class="block text-sm">Icon (image)</label>
                    <input type="file" name="data[items][{{ $index }}][icon]" class="w-full border p-2 rounded">
                    @if(!empty($item['icon']))
                    <img src="{{ asset('storage/'.$item['icon']) }}" class="w-12 mt-2 rounded">
                    @endif

                    {{-- Title --}}
                    <label class="block text-sm">Title</label>
                    <input type="text" name="data[items][{{ $index }}][title]" value="{{ $item['title'] }}" class="w-full border p-2 rounded">

                    {{-- Description --}}
                    <label class="block text-sm">Description</label>
                    <textarea name="data[items][{{ $index }}][desc]" rows="3" class="w-full border p-2 rounded">{{ $item['desc'] }}</textarea>

                    {{-- Link --}}
                    <label class="block text-sm">Link</label>
                    <input type="text" name="data[items][{{ $index }}][link]" value="{{ $item['link'] }}" class="w-full border p-2 rounded">
                </div>
                @endforeach
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded mt-4">
                Save Services
            </button>
        </form>
    </section>

</div>
@endsection