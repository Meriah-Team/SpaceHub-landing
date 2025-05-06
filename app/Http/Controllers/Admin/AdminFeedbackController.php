<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Http\Controllers\Controller;

class AdminFeedbackController extends Controller
{
    public function index(){
        // Get all feedback with pagination (15 items per page)
        $feedbacks = Feedback::latest()->paginate(15);
        
        return view('admin.feedback', compact('feedbacks'));
    }
    public function export()
    {
        $feedbacks = Feedback::all();
        
        // Create a timestamp for the filename
        $timestamp = now()->format('Y-m-d_H-i-s');
        $filename = "spacehub_feedback_export_{$timestamp}.json";
        
        // Return JSON response with download headers
        return response()->json($feedbacks)
            ->header('Content-Disposition', "attachment; filename=\"{$filename}\"")
            ->header('Content-Type', 'application/json');
    }
}
