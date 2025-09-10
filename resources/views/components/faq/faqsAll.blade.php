{{-- FAQ All Frontend Display Template --}}
@php
use App\Models\Content;
// Get FAQ data from Content model or pass from controller
$aboutServices = Content::getData('faq.aboutServices');
$aboutPayment = Content::getData('faq.aboutPayment');
$otherQuestions = Content::getData('faq.otherQuestions');
@endphp

{{-- About Services FAQ Section --}}
{{-- About Services FAQ Section --}}
<div class="space-y-4 lg:space-y-6 text-center my-[90px] gap-5 flex flex-col">
    <div class="flex flex-col items-center space-y-4 gap-5 text-center mb-6">
        <span class="inline-block px-3 lg:px-4 md:px-3 py-1 text-[10px] md:text-[8px] lg:text-[13px] font-medium text-gray-500 bg-[#f5f4f0] rounded-full w-fit">
            {{ $aboutServices['badge'] ?? 'FAQs' }}
        </span>
        <h1 class="text-2xl sm:text-4xl md:text-5xl lg:text-[54px] text-gray-900 leading-tight">
            {{ $aboutServices['heading'] ?? 'About Services' }}
        </h1>
    </div>

    <div class="max-w-2xl mx-auto space-y-2">
        @if(!empty($aboutServices['faqs']) && is_array($aboutServices['faqs']))
        @foreach($aboutServices['faqs'] as $index => $faq)
        <div>
            <button class="w-full flex justify-between items-center py-2 text-left accordion-btn border rounded-2xl p-4 lg:p-6 bg-[#f6f6f6]">
                <h2 class="font-light text-[12px] lg:text-[21px]">
                    {{ $faq['question'] ?? 'Question ' . ($index + 1) }}
                </h2>
                <svg class="w-5 h-5 transform transition-transform duration-300 accordion-icon"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                <p class="p-6 text-gray-600 text-[10px] lg:text-[16px]">
                    {{ $faq['answer'] ?? 'This is a default answer. Please update this content through the admin panel.' }}
                </p>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>


{{-- About Payment FAQ Section --}}
<div class="space-y-4 lg:space-y-6 text-center my-[90px] gap-5 flex flex-col">
    <div class="flex flex-col items-center space-y-4 gap-5 text-center mb-6">
        <span class="inline-block px-3 lg:px-4 md:px-3 py-1 text-[10px] md:text-[8px] lg:text-[13px] font-medium text-gray-500 bg-[#f5f4f0] rounded-full w-fit">
            {{ $aboutPayment['badge'] ?? 'FAQs' }}
        </span>
        <h1 class="text-2xl sm:text-4xl md:text-5xl lg:text-[54px] text-gray-900 leading-tight">
            {{ $aboutPayment['heading'] ?? 'About Payment' }}
        </h1>
    </div>

    <div class="max-w-2xl mx-auto space-y-2">
        @if(!empty($aboutPayment['faqs']) && is_array($aboutPayment['faqs']))
        @foreach($aboutPayment['faqs'] as $index => $faq)
        <div>
            <button class="w-full flex justify-between items-center py-2 text-left accordion-btn border rounded-2xl p-4 lg:p-6 bg-[#f6f6f6]">
                <h2 class="font-light text-[12px] lg:text-[21px]">
                    {{ $faq['question'] ?? 'Question ' . ($index + 1) }}
                </h2>
                <svg class="w-5 h-5 transform transition-transform duration-300 accordion-icon"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                <p class="p-6 text-gray-600 text-[10px] lg:text-[16px]">
                    {{ $faq['answer'] ?? 'This is a default answer. Please update this content through the admin panel.' }}
                </p>
            </div>
        </div>
        @endforeach
        @else
        {{-- Default content if no FAQs are found --}}
        @php
        $defaultPaymentFaqs = [
        ["question" => "What payment methods do you accept?", "answer" => "We accept cash, credit cards, debit cards, bank transfers, and most major insurance plans for your convenience."],
        ["question" => "Do you offer payment plans?", "answer" => "Yes, we offer flexible payment plans for eligible patients to help make healthcare more accessible and affordable."],
        ["question" => "Is insurance verification required?", "answer" => "We recommend verifying your insurance coverage before your visit to understand your benefits and any potential out-of-pocket costs."],
        ["question" => "When is payment due?", "answer" => "Payment is typically due at the time of service, though we can discuss alternative arrangements based on your specific situation."],
        ["question" => "Do you provide itemized bills?", "answer" => "Yes, we provide detailed, itemized statements for all services rendered to help you understand your charges and for insurance purposes."],
        ["question" => "What if I can't afford treatment?", "answer" => "We offer various financial assistance programs and can work with you to find affordable solutions for your healthcare needs."]
        ];
        @endphp
        @foreach($defaultPaymentFaqs as $index => $faq)
        <div>
            <button class="w-full flex justify-between items-center py-2 text-left accordion-btn border rounded-2xl p-4 lg:p-6 bg-[#f6f6f6]">
                <h2 class="font-light text-[12px] lg:text-[21px]">{{ $faq['question'] }}</h2>
                <svg class="w-5 h-5 transform transition-transform duration-300 accordion-icon"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                <p class="p-6 text-gray-600 text-[10px] lg:text-[16px]">
                    {{ $faq['answer'] }}
                </p>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>

{{-- Other Questions FAQ Section --}}
<div class="space-y-4 lg:space-y-6 text-center my-[90px] gap-5 flex flex-col">
    <div class="flex flex-col items-center space-y-4 gap-5 text-center mb-6">
        <span class="inline-block px-3 lg:px-4 md:px-3 py-1 text-[10px] md:text-[8px] lg:text-[13px] font-medium text-gray-500 bg-[#f5f4f0] rounded-full w-fit">
            {{ $otherQuestions['badge'] ?? 'FAQs' }}
        </span>
        <h1 class="text-2xl sm:text-4xl md:text-5xl lg:text-[54px] text-gray-900 leading-tight">
            {{ $otherQuestions['heading'] ?? 'Other Questions' }}
        </h1>
    </div>

    <div class="max-w-2xl mx-auto space-y-2">
        @if(!empty($otherQuestions['faqs']) && is_array($otherQuestions['faqs']))
        @foreach($otherQuestions['faqs'] as $index => $faq)
        <div>
            <button class="w-full flex justify-between items-center py-2 text-left accordion-btn border rounded-2xl p-4 lg:p-6 bg-[#f6f6f6]">
                <h2 class="font-light text-[12px] lg:text-[21px]">
                    {{ $faq['question'] ?? 'Question ' . ($index + 1) }}
                </h2>
                <svg class="w-5 h-5 transform transition-transform duration-300 accordion-icon"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                <p class="p-6 text-gray-600 text-[10px] lg:text-[16px]">
                    {{ $faq['answer'] ?? 'This is a default answer. Please update this content through the admin panel.' }}
                </p>
            </div>
        </div>
        @endforeach
        @else
        {{-- Default content if no FAQs are found --}}
        @php
        $defaultOtherFaqs = [
        ["question" => "What are your operating hours?", "answer" => "We are open Monday through Friday from 8:00 AM to 6:00 PM, Saturday from 9:00 AM to 4:00 PM, and closed on Sundays."],
        ["question" => "Do you offer emergency services?", "answer" => "Yes, we provide 24/7 emergency consultation services. Please call our emergency hotline for immediate assistance."],
        ["question" => "How can I schedule an appointment?", "answer" => "You can schedule appointments by calling our office, using our online booking system, or visiting us in person during business hours."],
        ["question" => "Do you provide home visits?", "answer" => "Yes, we offer home visit services for patients who are unable to come to our facility, subject to availability and medical requirements."],
        ["question" => "What should I bring to my first appointment?", "answer" => "Please bring a valid ID, insurance cards, list of current medications, and any relevant medical records from previous healthcare providers."],
        ["question" => "How far in advance should I book?", "answer" => "We recommend booking at least 1-2 weeks in advance for routine appointments, though we always try to accommodate urgent medical needs."]
        ];
        @endphp
        @foreach($defaultOtherFaqs as $index => $faq)
        <div>
            <button class="w-full flex justify-between items-center py-2 text-left accordion-btn border rounded-2xl p-4 lg:p-6 bg-[#f6f6f6]">
                <h2 class="font-light text-[12px] lg:text-[21px]">{{ $faq['question'] }}</h2>
                <svg class="w-5 h-5 transform transition-transform duration-300 accordion-icon"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div class="accordion-content max-h-0 overflow-hidden transition-all duration-300">
                <p class="p-6 text-gray-600 text-[10px] lg:text-[16px]">
                    {{ $faq['answer'] }}
                </p>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>

{{-- JavaScript for Accordion Functionality --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const accordions = document.querySelectorAll(".accordion-btn");

        accordions.forEach((btn) => {
            btn.addEventListener("click", () => {
                const content = btn.nextElementSibling;
                const icon = btn.querySelector(".accordion-icon");

                // Close others in the same section
                const currentSection = btn.closest('.space-y-4');
                currentSection.querySelectorAll(".accordion-content").forEach((c) => {
                    if (c !== content) {
                        c.style.maxHeight = null;
                        c.previousElementSibling.querySelector(".accordion-icon").classList.remove("rotate-180");
                    }
                });

                // Toggle clicked
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    icon.classList.remove("rotate-180");
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                    icon.classList.add("rotate-180");
                }
            });
        });
    });
</script>