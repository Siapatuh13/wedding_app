<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rsvp;

class RSVPController extends Controller
{
    public function index()
    {
        return view('rsvp');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'attendance' => 'required|in:yes,no',
            'guest_count' => 'nullable|integer|min:1|max:10',
            'guest_names' => 'nullable|string',
            'events' => 'nullable|array',
            'message' => 'nullable|string'
        ]);

        Rsvp::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'attendance' => $request->attendance,
            'guest_count' => $request->attendance === 'yes' ? ($request->guest_count ?? 1) : 0,
            'guest_names' => $request->guest_names,
            'events' => $request->attendance === 'yes' ? json_encode($request->events ?? []) : null,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Thank you! Your RSVP has been submitted successfully.');
    }
}