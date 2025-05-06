<?php

namespace App\Http\Controllers\Admin;

use App\Models\Workspace;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminWorkspaceController extends Controller
{
    public function showWorkspace(){
        $workspaces = Workspace::latest()->paginate(10);
        
        return view('admin.workspace', [
            'workspaces' => $workspaces
        ]);
    }
    
}
