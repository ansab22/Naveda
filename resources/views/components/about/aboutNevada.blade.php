{{-- About Eldera Section Component --}}
@php
use App\Models\Content;
$aboutEldera = Content::getData('home.aboutEldera');
@endphp

<div class="relative bg-white">
    <div class="py-10 lg:pt-[90px] flex flex-col lg:grid lg:grid-cols-2 gap-6 md:gap-12 items-start">

        <!-- Left Image -->
        <div class="relative flex flex-col gap-2 lg:gap-4 w-full">
            <span class="inline-block px-3 lg:px-4 md:px-3 py-1 text-[10px] md:text-[8px] lg:text-[13px] font-medium text-gray-500 bg-[#f5f4f0] rounded-full w-fit">
                {{ $aboutEldera['badge'] ?? 'About Eldera' }}
            </span>

            <h1 class="text-[28px] md:text-[38px] lg:text-6xl text-gray-900 leading-tight mt-2 mb-4 lg:mt-7 lg:mb-12">
                {{ $aboutEldera['heading'] ?? 'Empowering Care for the Heart and Soul' }}
            </h1>

            @php
            $mainImage = $aboutEldera['image'] ?? '/images/about1.jpg';
            if (str_starts_with($mainImage, 'content/')) {
                $mainImageSrc = asset('storage/' . $mainImage);
            } else {
                $mainImageSrc = asset($mainImage);
            }
            @endphp

            <img src="{{ $mainImageSrc }}" alt="Doctor with patient"
                class="rounded-2xl w-full object-cover h-[50vh] md:h-[60vh]"
                onerror="this.src='{{ asset('/images/about1.jpg') }}'">

            <!-- Testimonial Card -->
            <div class="absolute bottom-3 left-6 bg-[#f5f4f0] shadow-md rounded-xl flex items-center space-x-3 px-4 py-6">
                <div class="flex -space-x-2">
                    @php
                    $testimonials = $aboutEldera['testimonials'] ?? [
                        ['avatar' => '/images/icon-img-1.jpg'],
                        ['avatar' => '/images/icon-img-2.jpg'],
                        ['avatar' => '/images/icon-img-3.jpg'],
                        ['avatar' => '/images/icon-img-4.jpg']
                    ];
                    @endphp

                    @foreach($testimonials as $index => $testimonial)
                    @php
                    $avatarImage = $testimonial['avatar'] ?? '/images/icon-img-' . ($index + 1) . '.jpg';
                    if (str_starts_with($avatarImage, 'content/')) {
                        $avatarSrc = asset('storage/' . $avatarImage);
                    } else {
                        $avatarSrc = asset($avatarImage);
                    }
                    @endphp
                    <img src="{{ $avatarSrc }}"
                        class="w-6 h-6 lg:w-12 lg:h-12 rounded-full border-2 border-white"
                        alt="Patient {{ $index + 1 }}"
                        onerror="this.src='{{ asset('/images/icon-img-' . ($index + 1) . '.jpg') }}'">
                    @endforeach
                </div>
                <p class="text-gray-700 text-[10px] md:text-xs lg:text-sm font-medium">
                    {{ $aboutEldera['testimonial_text_1'] ?? 'Approved by more than' }} <br>
                    <span class="font-semibold">{{ $aboutEldera['testimonial_text_2'] ?? '1000 patients' }}</span>
                </p>
            </div>
        </div>

        <!-- Right Content -->
        <div class="flex flex-col gap-[20px] lg:gap-[55px] w-full">
            @php
            $firstPara = $aboutEldera['first_paragraph'] ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ullamcorper vehicula suscipit. Phasellus euismod dui lacinia, venenatis magna non, pretium felis. Nulla velit turpis, congue nec elit sit amet, sodales feugiat neque.';
            $secondPara = $aboutEldera['second_paragraph'] ?? 'Mauris in neque viverra, volutpat elit vitae, consequat arcu. Phasellus condimentum luctus turpis, sed mollis quam tempus eget. Vivamus non tellus varius, sollicitudin diam quis, sagittis libero.';
            
            // Check if each paragraph needs Read More (300 characters limit)
            $showReadMoreFirst = strlen($firstPara) > 300;
            $showReadMoreSecond = strlen($secondPara) > 300;
            @endphp

            <!-- First Paragraph -->
            <p class="text-gray-600 text-[10px] md:text-xs lg:text-base">
                <span id="first-para-preview">
                    {{ $showReadMoreFirst ? Str::limit($firstPara, 300, '...') : $firstPara }}
                </span>
                <span id="first-para-full" class="hidden">
                    {{ $firstPara }}
                </span>
                @if($showReadMoreFirst)
                    <button onclick="toggleFirstPara()" id="read-more-first" class="text-blue-600 hover:text-blue-700 font-medium ml-1 inline-flex items-center">
                        Read More
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <button onclick="toggleFirstPara()" id="read-less-first" class="text-blue-600 hover:text-blue-700 font-medium ml-1 hidden inline-flex items-center">
                        Read Less
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                        </svg>
                    </button>
                @endif
            </p>

            <!-- Second Paragraph -->
            <p class="text-gray-600 text-[10px] md:text-xs lg:text-base">
                <span id="second-para-preview">
                    {{ $showReadMoreSecond ? Str::limit($secondPara, 200, '...') : $secondPara }}
                </span>
                <span id="second-para-full" class="hidden">
                    {{ $secondPara }}
                </span>
                @if($showReadMoreSecond)
                    <button onclick="toggleSecondPara()" id="read-more-second" class="text-blue-600 hover:text-blue-700 font-medium ml-1 inline-flex items-center">
                        Read More
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <button onclick="toggleSecondPara()" id="read-less-second" class="text-blue-600 hover:text-blue-700 font-medium ml-1 hidden inline-flex items-center">
                        Read Less
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                        </svg>
                    </button>
                @endif
            </p>

            @php
            $secondaryImage = $aboutEldera['secondary_image'] ?? '/images/about2.jpg';
            if (str_starts_with($secondaryImage, 'content/')) {
                $secondaryImageSrc = asset('storage/' . $secondaryImage);
            } else {
                $secondaryImageSrc = asset($secondaryImage);
            }
            @endphp

            <img src="{{ $secondaryImageSrc }}" alt="Doctor with patient"
                class="rounded-2xl w-full object-cover h-[100%] md:h-[60vh]"
                onerror="this.src='{{ asset('/images/about2.jpg') }}'">
        </div>
    </div>
</div>

<script>
// Toggle First Paragraph
function toggleFirstPara() {
    const preview = document.getElementById('first-para-preview');
    const full = document.getElementById('first-para-full');
    const readMoreBtn = document.getElementById('read-more-first');
    const readLessBtn = document.getElementById('read-less-first');
    
    if (full.classList.contains('hidden')) {
        preview.classList.add('hidden');
        full.classList.remove('hidden');
        readMoreBtn.classList.add('hidden');
        readLessBtn.classList.remove('hidden');
    } else {
        full.classList.add('hidden');
        preview.classList.remove('hidden');
        readLessBtn.classList.add('hidden');
        readMoreBtn.classList.remove('hidden');
    }
}

// Toggle Second Paragraph
function toggleSecondPara() {
    const preview = document.getElementById('second-para-preview');
    const full = document.getElementById('second-para-full');
    const readMoreBtn = document.getElementById('read-more-second');
    const readLessBtn = document.getElementById('read-less-second');
    
    if (full.classList.contains('hidden')) {
        preview.classList.add('hidden');
        full.classList.remove('hidden');
        readMoreBtn.classList.add('hidden');
        readLessBtn.classList.remove('hidden');
    } else {
        full.classList.add('hidden');
        preview.classList.remove('hidden');
        readLessBtn.classList.add('hidden');
        readMoreBtn.classList.remove('hidden');
    }
}
</script>