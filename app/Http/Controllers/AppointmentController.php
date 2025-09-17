<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    // Store appointment
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'phone'     => 'required',
            'email'     => 'required|email',
            'date' => 'required|date',
            'service'   => 'required',
        ]);

        Appointment::create([
            'name'      => $request->name,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'date'      => $request->date,
            'service'   => $request->service,
            'message'   => $request->message,
            'user_id'   => Auth::id(),
        ]);

        return back()->with('success', 'Appointment booked successfully!');
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
