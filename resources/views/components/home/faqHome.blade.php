{{-- Dynamic FAQ Section for Frontend --}}
@php
// Get FAQ data from database with fallback defaults
$faqData = \App\Models\Content::getData('home.faqHome');

// Default FAQ data if nothing exists in database
$defaultFaq = [
'badge' => 'FAQs',
'heading' => 'Frequently Asked Questions',
'image' => 'images/faq.jpg',
'phone' => '+1 (234) 567 890 00',
'email' => 'eldera@mails.com',
'faqs' => [
[
'question' => 'How long has your company been established?',
'answer' => 'Tailwind CSS is a utility-first CSS framework that helps you build modern UIs faster by using utility classes.'
],
[
'question' => 'What services do you provide?',
'answer' => 'We provide comprehensive healthcare services including general consultations, specialized treatments, and emergency care.'
],
[
'question' => 'Do you accept insurance?',
'answer' => 'Yes, we accept most major insurance plans. Please contact our office to verify your specific coverage.'
],
[
'question' => 'What are your operating hours?',
'answer' => 'We are open Monday through Friday from 8:00 AM to 6:00 PM, and Saturday from 9:00 AM to 4:00 PM.'
],
[
'question' => 'How can I schedule an appointment?',
'answer' => 'You can schedule an appointment by calling our office, using our online booking system, or visiting us in person.'
],
[
'question' => 'Do you offer emergency services?',
'answer' => 'Yes, we provide 24/7 emergency services. Please call our emergency hotline for immediate assistance.'
]
]
];

// Merge admin data with defaults
$faq = array_merge($defaultFaq, $faqData ?: []);
$faqs = $faq['faqs'] ?? $defaultFaq['faqs'];

// Handle image path
$imagePath = $faq['image'] ?? $defaultFaq['image'];
if (str_starts_with($imagePath, 'content/')) {
$imageSrc = asset('storage/' . $imagePath);
if (!file_exists(storage_path('app/public/' . $imagePath))) {
$imageSrc = asset($defaultFaq['image']);
}
} else {
$imageSrc = asset($imagePath);
}
@endphp

<div class="mt-[30px] lg:mt-[90px] mb-[20px] lg:mb-[20px] flex flex-col gap-16 bg-white">
    <div class="pt-10 pb-0 lg:py-[90px] grid lg:grid-cols-2 gap-12 items-center">

        <!-- Left Image -->
        <div class="relative">
            @php
            $faqData = \App\Models\Content::getData('home.faqHome');
            $defaultFaqImage = 'images/faq.jpg';

            $imagePath = $faqData['image'] ?? '';
            if ($imagePath) {
            $imageSrc = str_starts_with($imagePath, 'content/') ? asset('storage/' . $imagePath) : asset($imagePath);
            } else {
            $imageSrc = asset($defaultFaqImage);
            }
            @endphp
            <img id="faqImage" src="{{ $imageSrc }}" alt="FAQ Image"
                class="rounded-3xl w-full object-cover h-[100vh] transition-all duration-500"
                onerror="this.src='{{ asset($defaultFaqImage) }}'">

            <!-- Small Card -->
            <div
                class="absolute bottom-3 left-6 bg-white shadow-md rounded-2xl flex flex-col items-start space-y-4 lg:space-y-6 px-4 lg:px-8 py-8 w-[80%] md:w-[30%] lg:w-[55%]">
                <div class="flex gap-3 w-full items-center">
                    <i class="fa-solid fa-phone-volume text-[12px] lg:text-[22px] text-[#e0e6ff] cursor-pointer"></i>
                    <h3 class="text-[12px] lg:text-[19px] cursor-pointer">{{ $faq['phone'] }}</h3>
                </div>
                <div class="flex gap-3 w-full items-center">
                    <i class="fa-regular fa-envelope text-[12px] lg:text-[22px] text-[#e0e6ff] cursor-pointer"></i>
                    <h3 class="text-[12px] lg:text-[19px] cursor-pointer">{{ $faq['email'] }}</h3>
                </div>
            </div>
        </div>

        <!-- Right Content -->
        <div class="space-y-4 lg:space-y-6">
            <div class="mb-6 lg:mb-12 space-y-4">
                <span class="inline-block px-3 lg:px-4 md:px-3 py-1 text-[10px] md:text-[8px] lg:text-[13px] font-medium text-gray-500 bg-[#f5f4f0] rounded-full w-fit">
                    {{ $faq['badge'] }}
                </span>
                <h1 class="text-2xl sm:text-4xl md:text-5xl lg:text-[54px] text-gray-900 text-left leading-tight">
                    {{ $faq['heading'] }}
                </h1>
            </div>
            <div class="max-w-2xl mx-auto space-y-2">

                @foreach($faqs as $index => $faqItem)
                <!-- Accordion Item {{ $index + 1 }} -->
                <div>
                    <button
                        class="w-full flex justify-between items-center py-2 text-left accordion-btn border rounded-2xl p-4 lg:p-6 bg-[#f6f6f6]">
                        <h2 class="font-light text-[12px] lg:text-[21px]">
                            {{ $faqItem['question'] ?? 'Question not available' }}
                        </h2>
                        <svg class="w-5 h-5 transform transition-transform duration-300 accordion-icon"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                        <p class="p-6 text-gray-600 text-[10px] lg:text-[16px]">
                            {{ $faqItem['answer'] ?? 'Answer not available' }}
                        </p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>

<script>
    const accordions = document.querySelectorAll(".accordion-btn");
    const faqImage = document.getElementById("faqImage");

    accordions.forEach((btn) => {
        btn.addEventListener("click", () => {
            const content = btn.nextElementSibling;
            const icon = btn.querySelector(".accordion-icon");

            // Close others
            document.querySelectorAll(".accordion-content").forEach((c) => {
                if (c !== content) {
                    c.style.maxHeight = null;
                    c.previousElementSibling.querySelector(".accordion-icon").classList.remove("rotate-180");
                }
            });

            // Toggle clicked
            if (content.style.maxHeight) {
                content.style.maxHeight = null;
                icon.classList.remove("rotate-180");

                // Image back to normal
                faqImage.classList.remove("h-[100vh]");
                faqImage.classList.add("h-[90vh]");
            } else {
                content.style.maxHeight = content.scrollHeight + "px";
                icon.classList.add("rotate-180");

                // Image expand when open
                faqImage.classList.remove("h-[90vh]");
                faqImage.classList.add("h-[100vh]");
            }
        });
    });
</script>