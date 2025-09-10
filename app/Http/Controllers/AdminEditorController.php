<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class AdminEditorController extends Controller
{
    public function __construct() {}

    public function index()
    {
        // list all section keys you want editable
        $keys = [
            'home.heroHome',
            'home.vedio',
            'home.aboutHome',
            'home.aboutEldera',
            'about.service',
            'home.experience',
            'home.mission',
            'home.service',
            'home.appointmentHome',
            'home.startedHome',
            'home.teamHome',
            'home.faqHome',
            'footer',

            'faq.aboutServices',
            'faq.aboutPayment',
            'faq.otherQuestions',

            'home.pricing',
            'home.map'
        ];




        $data = [];
        foreach ($keys as $k) {
            $data[$k] = Content::getData($k);
        }

        return view('admin.home-editor', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'key'   => 'required|string',
            'image' => 'nullable|image|max:4096',
        ]);

        $key  = $request->input('key');
        $data = $request->input('data', []);

        // Handle FAQ All sections specifically
        if (in_array($key, ['faq.aboutServices', 'faq.aboutPayment', 'faq.otherQuestions'])) {
            // Ensure we have at least 6 FAQ items
            $defaultAnswers = [
                'faq.aboutServices' => [
                    ["question" => "How long has your company been established?", "answer" => "Our company has been providing healthcare services for over 15 years, establishing ourselves as a trusted provider in the community."],
                    ["question" => "What types of services do you offer?", "answer" => "We offer comprehensive healthcare services including primary care, specialty consultations, diagnostic services, and preventive care programs."],
                    ["question" => "Are your staff members certified?", "answer" => "Yes, all our healthcare professionals are fully licensed and certified in their respective fields, with ongoing training to maintain the highest standards."],
                    ["question" => "Do you accept walk-in appointments?", "answer" => "We accept both scheduled appointments and walk-ins, though we recommend scheduling to ensure minimal wait times."],
                    ["question" => "What safety protocols do you follow?", "answer" => "We maintain strict safety protocols including sanitation procedures, equipment sterilization, and adherence to all healthcare regulations."],
                    ["question" => "How do you ensure quality of care?", "answer" => "We have comprehensive quality assurance programs, regular staff training, and patient feedback systems to continuously improve our services."]
                ],
                'faq.aboutPayment' => [
                    ["question" => "What payment methods do you accept?", "answer" => "We accept cash, credit cards, debit cards, bank transfers, and most major insurance plans for your convenience."],
                    ["question" => "Do you offer payment plans?", "answer" => "Yes, we offer flexible payment plans for eligible patients to help make healthcare more accessible and affordable."],
                    ["question" => "Is insurance verification required?", "answer" => "We recommend verifying your insurance coverage before your visit to understand your benefits and any potential out-of-pocket costs."],
                    ["question" => "When is payment due?", "answer" => "Payment is typically due at the time of service, though we can discuss alternative arrangements based on your specific situation."],
                    ["question" => "Do you provide itemized bills?", "answer" => "Yes, we provide detailed, itemized statements for all services rendered to help you understand your charges and for insurance purposes."],
                    ["question" => "What if I can't afford treatment?", "answer" => "We offer various financial assistance programs and can work with you to find affordable solutions for your healthcare needs."]
                ],
                'faq.otherQuestions' => [
                    ["question" => "What are your operating hours?", "answer" => "We are open Monday through Friday from 8:00 AM to 6:00 PM, Saturday from 9:00 AM to 4:00 PM, and closed on Sundays."],
                    ["question" => "Do you offer emergency services?", "answer" => "Yes, we provide 24/7 emergency consultation services. Please call our emergency hotline for immediate assistance."],
                    ["question" => "How can I schedule an appointment?", "answer" => "You can schedule appointments by calling our office, using our online booking system, or visiting us in person during business hours."],
                    ["question" => "Do you provide home visits?", "answer" => "Yes, we offer home visit services for patients who are unable to come to our facility, subject to availability and medical requirements."],
                    ["question" => "What should I bring to my first appointment?", "answer" => "Please bring a valid ID, insurance cards, list of current medications, and any relevant medical records from previous healthcare providers."],
                    ["question" => "How far in advance should I book?", "answer" => "We recommend booking at least 1-2 weeks in advance for routine appointments, though we always try to accommodate urgent medical needs."]
                ]
            ];

            $defaults = $defaultAnswers[$key] ?? [];

            // Process FAQ items
            if (!empty($data['faqs']) && is_array($data['faqs'])) {
                foreach ($data['faqs'] as $i => $faqItem) {
                    // Clean and validate input
                    $question = trim($faqItem['question'] ?? '');
                    $answer = trim($faqItem['answer'] ?? '');

                    // If empty input, use default content
                    if (empty($question) || empty($answer)) {
                        if (isset($defaults[$i])) {
                            $data['faqs'][$i] = $defaults[$i];
                        } else {
                            // If no default available, create generic content
                            $data['faqs'][$i] = [
                                'question' => $question ?: "Question " . ($i + 1),
                                'answer' => $answer ?: "This is a default answer for question " . ($i + 1) . ". Please update this content through the admin panel."
                            ];
                        }
                    } else {
                        $data['faqs'][$i] = [
                            'question' => $question,
                            'answer' => $answer
                        ];
                    }
                }
            } else {
                // No FAQs provided, use all defaults
                $data['faqs'] = $defaults;
            }

            // Ensure we always have exactly 6 FAQs
            while (count($data['faqs']) < 6) {
                $index = count($data['faqs']);
                if (isset($defaults[$index])) {
                    $data['faqs'][] = $defaults[$index];
                } else {
                    $data['faqs'][] = [
                        'question' => "Question " . ($index + 1),
                        'answer' => "This is a default answer for question " . ($index + 1) . ". Please update this content through the admin panel."
                    ];
                }
            }

            // Limit to 6 FAQs
            $data['faqs'] = array_slice($data['faqs'], 0, 6);

            // Set default header content if empty
            if (empty($data['badge'])) {
                $data['badge'] = 'FAQs';
            }

            if (empty($data['heading'])) {
                $headingDefaults = [
                    'faq.aboutServices' => 'About Services',
                    'faq.aboutPayment' => 'About Payment',
                    'faq.otherQuestions' => 'Other Questions'
                ];
                $data['heading'] = $headingDefaults[$key] ?? 'Frequently Asked Questions';
            }
        }

        // Handle YouTube URLs for video sections
        if (!empty($data['embed'])) {
            $url = $data['embed'];
            if (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $url, $matches)) {
                $data['embed'] = "https://www.youtube.com/embed/{$matches[1]}?autoplay=1&mute=0";
            } elseif (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
                $data['embed'] = "https://www.youtube.com/embed/{$matches[1]}?autoplay=1&mute=0";
            }
        }

        // Handle JSON string items
        if (!empty($data['items']) && is_string($data['items'])) {
            $decoded = json_decode($data['items'], true);
            if (json_last_error() === JSON_ERROR_NONE) $data['items'] = $decoded;
        }

        // Handle About Service section specifically
        if ($key === 'about.service') {
            $existingData = Content::getData($key);
            $data['image'] = $existingData['image'] ?? '';

            if (!empty($data['items']) && is_array($data['items'])) {
                foreach ($data['items'] as $i => $item) {
                    $data['items'][$i]['icon'] = $item['icon'] ?? $existingData['items'][$i]['icon'] ?? '';
                    $data['items'][$i]['title'] = $item['title'] ?? '';
                    $data['items'][$i]['description'] = $item['description'] ?? '';
                    $data['items'][$i]['image'] = '';
                }
            }
        }

        // Handle file uploads for items (services, team members, etc.)
        if (!empty($data['items']) && is_array($data['items']) && $key !== 'about.service') {
            foreach ($data['items'] as $i => $item) {
                if ($request->hasFile("data.items.$i.image")) {
                    $data['items'][$i]['image'] = $request->file("data.items.$i.image")->store('content', 'public');
                }
                if ($request->hasFile("data.items.$i.icon")) {
                    $data['items'][$i]['icon'] = $request->file("data.items.$i.icon")->store('content', 'public');
                }

                $existingData = Content::getData($key);
                if (!$request->hasFile("data.items.$i.image") && isset($existingData['items'][$i]['image'])) {
                    $data['items'][$i]['image'] = $existingData['items'][$i]['image'];
                }
                if (!$request->hasFile("data.items.$i.icon") && isset($existingData['items'][$i]['icon'])) {
                    $data['items'][$i]['icon'] = $existingData['items'][$i]['icon'];
                }
            }
        }

        // Handle About Eldera section specifically
        if ($key === 'home.aboutEldera') {
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('content/about-eldera', 'public');
            } else {
                $data['image'] = '';
            }

            if ($request->hasFile('data.secondary_image')) {
                $data['secondary_image'] = $request->file('data.secondary_image')->store('content/about-eldera', 'public');
            } else {
                $data['secondary_image'] = '';
            }

            if (!empty($data['testimonials']) && is_array($data['testimonials'])) {
                foreach ($data['testimonials'] as $i => $testimonial) {
                    if ($request->hasFile("data.testimonials.$i.avatar")) {
                        $data['testimonials'][$i]['avatar'] = $request->file("data.testimonials.$i.avatar")->store('content/about-eldera', 'public');
                    } else {
                        $data['testimonials'][$i]['avatar'] = '';
                    }
                }
            }
        }

        // Handle team members specifically
        if ($key === 'home.teamHome' && !empty($data['members']) && is_array($data['members'])) {
            foreach ($data['members'] as $i => $member) {
                if ($request->hasFile("data.members.$i.image")) {
                    $data['members'][$i]['image'] = $request->file("data.members.$i.image")->store('content/team', 'public');
                } else {
                    $data['members'][$i]['image'] = '';
                }
            }
        }

        // Handle FAQ section specifically
        if ($key === 'home.faqHome') {
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('content/faq', 'public');
            } else {
                $data['image'] = '';
            }

            if (!empty($data['faqs']) && is_array($data['faqs'])) {
                foreach ($data['faqs'] as $i => $faqItem) {
                    if (isset($faqItem['question'])) {
                        $data['faqs'][$i]['question'] = trim($faqItem['question']);
                    }
                    if (isset($faqItem['answer'])) {
                        $data['faqs'][$i]['answer'] = trim($faqItem['answer']);
                    }
                }
            }
        }

        // Handle single image upload for other sections
        if ($request->hasFile('image') && !in_array($key, ['home.faqHome', 'home.aboutEldera', 'about.service', 'faq.aboutServices', 'faq.aboutPayment', 'faq.otherQuestions'])) {
            $data['image'] = $request->file('image')->store('content', 'public');
        } else if (!in_array($key, ['home.faqHome', 'home.aboutEldera', 'about.service', 'faq.aboutServices', 'faq.aboutPayment', 'faq.otherQuestions'])) {
            $existingData = Content::getData($key);
            if (isset($existingData['image'])) {
                $data['image'] = $existingData['image'];
            }
        }

        if ($key === 'home.pricing') {
            $defaultPackages = [
                [
                    "price" => "$400",
                    "title" => "Basic Package",
                    "desc" => "Lorem ipsum dolor sit amet, consec tetur adipiscing elit.",
                    "features" => ["Personal Care Assistance", "Meal Preparation", "Medication Reminders", "Companionship"]
                ],
                [
                    "price" => "$520",
                    "title" => "Standard Package",
                    "desc" => "Lorem ipsum dolor sit amet, consec tetur adipiscing elit.",
                    "features" => ["Personal Care Assistance", "Meal Preparation", "Medication Reminders", "Transportation Support"]
                ],
                [
                    "price" => "$640",
                    "title" => "Premium Package",
                    "desc" => "Lorem ipsum dolor sit amet, consec tetur adipiscing elit.",
                    "features" => ["Personal Care Assistance", "Meal Preparation", "Medication Reminders", "24/7 Support"]
                ],
            ];

            if (!empty($data['items']) && is_array($data['items'])) {
                foreach ($data['items'] as $i => $item) {
                    $price = trim($item['price'] ?? '');
                    $title = trim($item['title'] ?? '');
                    $desc = trim($item['desc'] ?? '');
                    $features = !empty($item['features']) ? array_map('trim', explode(',', $item['features'])) : [];

                    if (empty($price) || empty($title) || empty($desc) || empty($features)) {
                        $data['items'][$i] = $defaultPackages[$i] ?? [];
                    } else {
                        $data['items'][$i] = [
                            'price' => $price,
                            'title' => $title,
                            'desc' => $desc,
                            'features' => $features
                        ];
                    }
                }
            } else {
                $data['items'] = $defaultPackages;
            }
        }




        // Save in DB
        Content::setData($key, $data);

        return back()->with('success', 'Section updated successfully.');
    }
}
