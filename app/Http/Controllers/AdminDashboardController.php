<?php

namespace App\Http\Controllers;

use App\Models\Workspace;
use App\Models\Feedback;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $workspaceCount = Workspace::count();
        $feedbackCount = Feedback::count();
        $recentFeedback = Feedback::latest()->take(5)->get();
        
        return view('admin.dashboard', [
            'workspaceCount' => $workspaceCount,
            'feedbackCount' => $feedbackCount,
            'recentFeedback' => $recentFeedback
        ]);
    }
}
