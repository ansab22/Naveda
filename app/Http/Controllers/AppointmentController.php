<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AppointmentController extends Controller
{
    // Store appointment
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'email'   => 'required|email',
            'date'    => 'required|date',
            'service' => 'required|string',
            'message' => 'nullable|string',
        ]);

        // Check if user already exists
        $user = User::where('email', $validated['email'])->first();

        if (!$user) {
            // New user create
            $password = Str::random(8);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($password),
                'role' => 'user',
            ]);

            // Send email with login credentials
            Mail::send('emails.welcome_user', [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $password,
            ], function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Your Account has been created - Appointment System');
            });
        }

        // Save appointment
        $appointment = Appointment::create([
            'user_id' => $user->id,
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'date' => $validated['date'],
            'service' => $validated['service'],
            'message' => $validated['message'],
        ]);

        return back()->with('success', 'Your appointment has been booked! Please check your email for login details.');
    }

    // Show appointments
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $appointments = Appointment::latest()->get();
            return view('admin.appointments.show', compact('appointments'));
        }

        if ($user->role === 'receptionist') {
            $appointments = Appointment::latest()->get();
            return view('receptionist.appointments.show', compact('appointments'));
        }
        // ✅ User: show only his own appointments
        if ($user->role === 'user') {
            $appointments = Appointment::where('user_id', $user->id)->latest()->get();
            return view('user.appointments.index', compact('appointments'));
        }
    }
}
