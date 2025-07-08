<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\RSVPController;

Route::get('/', function () {
    return view('index');
});


Route::get('/home', function () {
    $imageDirectory = public_path('images/photos');
    $images = File::exists($imageDirectory) ? File::files($imageDirectory) : [];
    $imageNames = array_map(fn($file) => $file->getFilename(), $images);
    return view('home', ['images' => $imageNames]);
});

Route::get('/rsvp', [RSVPController::class, 'index'])->name('rsvp');
Route::post('/rsvp', [RSVPController::class, 'submit'])->name('rsvp.submit');

// Also add the wishes API route for the wishes section
Route::get('/api/wishes', function() {
    return response()->json([
        'wishes' => \App\Models\Rsvp::whereNotNull('message')
            ->where('message', '!=', '')
            ->select('message', 'first_name', 'last_name')
            ->latest()
            ->take(20) // Limit to recent 20 wishes
            ->get()
            ->map(function($rsvp) {
                return [
                    'message' => $rsvp->message,
                    'author' => $rsvp->first_name . ' ' . substr($rsvp->last_name, 0, 1) . '.'
                ];
            })
    ]);
});
