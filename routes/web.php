<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminEditorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about-us', function () {
    return view('about');
})->name('about');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::get('/appointment', function () {
    return view('appointment');
})->name('appointment');

Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/faqs', function () {
    return view('faq');
})->name('faqs');

Route::get('/contact-us', function () {
    return view('contact');
})->name('contact');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/appointments', [AppointmentController::class, 'index'])->name('admin.appointments.show');
    Route::get('/contact/form', [ContactController::class, 'index'])->name('contacts.show');
    Route::get('/admin/home-editor', [AdminEditorController::class, 'index'])->name('admin.home-editor');
    Route::post('/admin/home-editor/update', [AdminEditorController::class, 'update'])->name('admin.home-editor.update');
});

// Receptionist routes
Route::middleware(['auth', 'receptionist'])->group(function () {
    Route::get('/receptionist/dashboard', [ReceptionistController::class, 'index'])->name('receptionist.dashboard');
    Route::get('/receptionist/appointments', [AppointmentController::class, 'index'])->name('receptionist.appointments.show');
    Route::get('/receptionist/contact/form', [ContactController::class, 'index'])->name('receptionist.contacts.show');
});
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/user/appointments', [AppointmentController::class, 'index'])->name('user.appointments');
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [UserController::class, 'update'])->name('profile.update');
});
Route::post('/appointments', [AppointmentController::class, 'store'])
    ->name('appointments.store');

Route::post('/contact/store', [ContactController::class, 'store'])
    ->name('contact.store');
// ✅ Shared update status route (accessible for admin + receptionist)
Route::middleware(['auth'])->group(function () {
    Route::post('/appointments/{appointment}/status', [AppointmentController::class, 'updateStatus'])
        ->name('appointments.updateStatus');
});

require __DIR__ . '/auth.php';
