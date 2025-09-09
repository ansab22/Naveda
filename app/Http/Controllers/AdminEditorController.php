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
            'home.experience',
            'home.mission',
            'home.service',
            'home.appointmentHome',
            'home.startedHome',
            'home.teamHome',
            'home.faqHome',
            'footer'
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

        // ✅ Handle YouTube URLs
        if (!empty($data['embed'])) {
            $url = $data['embed'];

            // Check for "watch?v="
            if (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $url, $matches)) {
                $videoId       = $matches[1];
                $data['embed'] = "https://www.youtube.com/embed/{$videoId}?autoplay=1&mute=0";
            }
            // Check for "youtu.be/"
            elseif (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
                $videoId       = $matches[1];
                $data['embed'] = "https://www.youtube.com/embed/{$videoId}?autoplay=1&mute=0";
            }
        }

        // ✅ Features string ko array banado (hero section ke liye)
        if (!empty($data['features']) && is_string($data['features'])) {
            $data['features'] = array_map('trim', explode(',', $data['features']));
        }

        // ✅ JSON fields (services / experience ke liye)
        if (!empty($data['items']) && is_string($data['items'])) {
            $decoded = json_decode($data['items'], true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $data['items'] = $decoded;
            }
        }

        if (!empty($data['items']) && is_array($data['items'])) {
            foreach ($data['items'] as $i => $item) {
                // existing image
                if ($request->hasFile("data.items.$i.image")) {
                    $path = $request->file("data.items.$i.image")->store('content', 'public');
                    $data['items'][$i]['image'] = $path;
                }

                // ✅ handle icon for services
                if ($request->hasFile("data.items.$i.icon")) {
                    $path = $request->file("data.items.$i.icon")->store('content', 'public');
                    $data['items'][$i]['icon'] = $path;
                }
            }
        }



        // ✅ Handle multiple team member images
        if (!empty($data['members']) && is_array($data['members'])) {
            foreach ($data['members'] as $i => $member) {
                if ($request->hasFile("data.members.$i.image")) {
                    $path = $request->file("data.members.$i.image")->store('content', 'public');
                    $data['members'][$i]['image'] = $path;
                }
            }
        }

        // ✅ Image handle (single image case)
        if ($request->hasFile('image')) {
            $path          = $request->file('image')->store('content', 'public');
            $data['image'] = $path;
        }

        // Save into DB
        Content::setData($key, $data);

        return back()->with('success', 'Section updated.');
    }
}
