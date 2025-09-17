@php
use App\Models\Content;
use Illuminate\Support\Str;

$mission = Content::getData('home.mission');
$defaultImages = [
asset('images/img-1.jpg'),
asset('images/img-2.jpg'),
asset('images/img-3.jpg'),
];
@endphp

<div class="py-16 bg-[#f6f6f6]">
    <div class="w-full sm:w-[90%] md:w-[70%] lg:w-[60%] mx-auto">
        <div class="flex flex-col gap-3 justify-center items-center">
            <span class="inline-block px-3 py-1 text-[10px] lg:text-[13px] font-medium text-gray-500 bg-white rounded-full w-fit">
                {{ $mission['badge'] ?? 'About Eldera' }}
            </span>
            <h1 class="text-[22px] sm:text-[28px] md:text-[38px] lg:text-6xl text-gray-900 text-center leading-tight">
                {!! $mission['heading'] ?? "Empowering Care for the Heart and Soul" !!}
            </h1>
            <p class="mt-4 text-gray-600 text-xs sm:text-sm lg:text-base text-center">
                {!! $mission['description'] ?? "Lorem ipsum dolor sit amet, consectetur adipiscing elit..." !!}
            </p>
        </div>
    </div>

    <!-- List Section -->
    <div class="mt-12 w-full sm:w-[90%] md:w-[70%] lg:w-[55%] mx-auto px-4 space-y-10">
        @php
        $items = $mission['items'] ?? [
        ["title" => "Improving lives through dedication and skill", "image" => null],
        ["title" => "Excellence in nursing, every step of the way", "image" => null],
        ["title" => "Inspired by elegance, driven by compassion", "image" => null],
        ];
        @endphp

        @foreach($items as $i => $item)
        @php
        $img = $item['image'] ?? null;

        // Default image depends on index (0 = img-1, 1 = img-2, 2 = img-3)
        $src = $defaultImages[$i] ?? asset('images/default.jpg');
        if ($img) {
        if (Str::startsWith($img, ['http', 'https', '/images', '/storage'])) {
        $src = $img;
        } else {
        $src = asset('storage/'.$img);
        }
        }

        @endphp

        <div class="flex flex-col {{ $i % 2 == 1 ? 'md:flex-row-reverse' : 'md:flex-row' }} items-center justify-between gap-4">
            <h3 class="text-lg sm:text-xl md:text-2xl lg:text-[32px] font-light text-black text-center md:text-left">
                {{ sprintf('%02d.', $i+1) }} {{ $item['title'] ?? '' }}
            </h3>
            <img src="{{ $src }}" alt="mission" class="w-24 h-12 object-cover rounded-full">
        </div>
        @endforeach
    </div>
</div>