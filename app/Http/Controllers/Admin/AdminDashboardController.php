<?php

namespace App\Http\Controllers\Admin;

use App\Models\Workspace;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
    public function showWorkspaces(){
        $workspaces = Workspace::all();
        return view('admin.workspaces', [
            'workspaces' => $workspaces
        ]);
    }
}
