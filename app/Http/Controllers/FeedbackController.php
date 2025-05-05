<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    // Store feedback
    public function store(Request $request){
        $request->validate([
            'first_name'=> 'required|string|max:50',
            'last_name'=> 'required|string|max:50',
            'email'=> 'required|email|max:50',
            'message'=> 'required|string|max:500'
        ]);
        // Concat first_name dan last_name
        $name = $request->first_name . ' ' . $request->last_name;
        // Create feedback
        Feedback::create([
            'name' => $name,
            'email' => $request->email,
            'message' => $request->message
        ]);
        // Redirect to landing page
        return redirect()->route('landing.index')->with('success', 'Feedback submitted successfully!');
    }
}
