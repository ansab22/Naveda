@php
    $contact = \App\Models\Content::getData('contact.info');
    $badge = $contact['badge'] ?? 'Get in Touch';
    $heading = $contact['heading'] ?? 'Send Us a Message';
    $items = $contact['items'] ?? [
        [
            'icon' => 'fa-solid fa-location-dot',
            'text' => '2299 Montessouri Street Las Vegas, NV 89117',
            'link' => 'https://www.google.com/maps?q=2299+Montessouri+Street+Las+Vegas,+NV+89117'
        ],
        [
            'icon' => 'fa-solid fa-phone-volume',
            'text' => '+1 (702)-805-5567',
            'link' => 'tel:+17028055567'
        ],
        [
            'icon' => 'fa-solid fa-envelope',
            'text' => 'info@nvmemorycare.com',
            'link' => 'mailto:info@nvmemorycare.com'
        ],
    ];
@endphp
<div class="mt-8 lg:mt-16 mb-12">
    <!-- Responsive grid with two columns -->
    <div class="grid grid-cols-1 lg:grid-cols-2  gap-6 lg:gap-10">

        <!-- Left Image Section -->
        <div class="flex flex-col gap-0 sm:gap-6 lg:justify-between items-start ">
            <div class="flex flex-col gap-4 sm:gap-6 justify-center items-start mb-8">
                <span class="inline-block px-3 lg:px-4 md:px-3 py-1 text-[10px] md:text-[8px] lg:text-[13px] font-medium text-gray-500 bg-[#f5f4f0] rounded-full w-fit">
                    {{ $badge }}
                </span>
                <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl text-gray-900 leading-tight">
                    {{ $heading }}
                </h1>
            </div>
            <div class="flex flex-col gap-2 lg:gap-6">
                @foreach($items as $item)
                    <div class="flex gap-3 w-full items-center">
                        <i class="{{ $item['icon'] ?? '' }} text-[12px] lg:text-[22px] text-[#c4cffa] cursor-pointer"></i>
                        @if(!empty($item['link']))
                            <a href="{{ $item['link'] }}" target="_blank">
                                <h3 class="text-[12px] lg:text-[19px] cursor-pointer">{{ $item['text'] }}</h3>
                            </a>
                        @else
                            <h3 class="text-[12px] lg:text-[19px]">{{ $item['text'] }}</h3>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Right Form Section -->
        <div class="">
            <!-- Heading -->


            <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                @csrf
                <!-- Name -->
                <div class="flex flex-col gap-2">
                    <label for="name" class="text-[10px] md:text-xs lg:text-sm font-medium text-gray-700">Your Name *</label>
                    <input type="text" id="name" name="name" required
                        class="w-full py-1 px-2 text-[10px] md:text-xs lg:text-sm lg:p-3 border bg-[#fcf9f8] border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="John Doe">
                </div>

                <!-- Phone + Email -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-2">
                        <label for="phone" class="text-[10px] md:text-xs lg:text-sm  font-medium text-gray-700">Phone *</label>
                        <input type="tel" id="phone" name="phone" required
                            class="w-full py-1 px-2 text-[10px] md:text-xs lg:text-sm lg:p-3 border bg-[#fcf9f8] border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="+1 (234) 567 890">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="email" class="text-[10px] md:text-xs lg:text-sm font-medium text-gray-700">Email *</label>
                        <input type="email" id="email" name="email" required
                            class="w-full py-1 px-2 text-[10px] md:text-xs lg:text-sm lg:p-3 border bg-[#fcf9f8] border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="example@mail.com">
                    </div>
                </div>

                <!-- Message -->
                <div class="flex flex-col gap-2">
                    <label for="message" class="text-[10px] md:text-xs lg:text-sm font-medium text-gray-700">Message</label>
                    <textarea id="message" name="message" rows="4"
                        class="w-full py-1 px-2 text-[10px] md:text-xs lg:text-sm lg:p-3 border bg-[#fcf9f8] border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Hello there!"></textarea>
                </div>

                <!-- Submit -->
                <button type="submit"
                    class="px-4 py-2 md:px-6 md:py-3 rounded-full bg-indigo-200 font-medium hover:bg-[#f5f4f0] text-[10px] lg:text-sm transition-colors duration-700 ease-in-out w-fit">
                    Send Message
                </button>
            </form>
        </div>
    </div>
</div>