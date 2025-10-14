@php
use App\Models\Content;
$data = Content::getData('home.experience');
$items = $data['items'] ?? [
["number" => 35, "suffix" => "+", "title" => "Years of Experience", "desc" => "Delivering trusted care and compassionate service for over three decades."],
["number" => 140, "suffix" => "", "title" => "Professional Staffs", "desc" => "A dedicated team of skilled and compassionate healthcare experts."],
["number" => 6.2, "suffix" => "K+", "title" => "Happy Patients", "desc" => "Enhancing lives through personalized attention and heartfelt care."],
["number" => 99.9, "suffix" => "%", "title" => "Positive Reviews", "desc" => "Consistently exceeding expectations with quality and trust.
"],
];
@endphp

<div class="lg:py-16">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($items as $item)
        <div class="bg-[#f6f6f6] shadow-sm rounded-2xl p-6 md:p-8 text-center lg:text-left">
            <h2 class="text-[38px] lg:text-6xl font-light text-gray-900"
                x-data="counter({{ $item['number'] }}, {{ str_contains($item['suffix'], '.') || str_contains($item['suffix'], '%') ? 'true' : 'false' }})"
                x-init="start()"
                x-text="display + '{{ $item['suffix'] }}'"></h2>

            <h3 class="mt-[30px] text-[18px] lg:mt-[124px] lg:text-[24px] font-light text-gray-800">
                {{ $item['title'] }}
            </h3>

            <p class="mt-1 text-xs md:text-base text-[#696969] ">
                {{ $item['desc'] }}
            </p>
        </div>
        @endforeach
    </div>
</div>

<script src="//unpkg.com/alpinejs" defer></script>
<script>
    function counter(target, decimal = false) {
        return {
            display: 0,
            start() {
                let current = 0;
                let step = target / 100; // speed of counting
                let interval = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        current = target;
                        clearInterval(interval);
                    }
                    this.display = decimal ? current.toFixed(1) : Math.floor(current);
                }, 20);
            }
        }
    }
</script>