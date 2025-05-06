<?php

namespace App\Http\Controllers\Admin;

use App\Models\Workspace;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminWorkspaceController extends Controller
{
    public function showWorkspace(){
        $workspaces = Workspace::latest()->paginate(10);
        
        return view('admin.workspace', [
            'workspaces' => $workspaces
        ]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string',
            'opening_time' => 'required',
            'closing_time' => 'required',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description_images.*' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Process facilities
        $facilities = $request->has('facilities') ? 
            array_map('trim', explode(',', $request->facilities)) : 
            [];
        
        // Create workspace
        $workspace = Workspace::create([
            'name' => $request->name,
            'address' => $request->address,
            'opening_time' => $request->opening_time,
            'closing_time' => $request->closing_time,
            'phone' => $request->phone,
            'maps' => $request->maps,
            'email' => $request->email,
            'instagram' => $request->instagram,
            'tiktok' => $request->tiktok,
            'facilities' => $facilities,
            'description' => $request->description,
            'city' => $request->city,
            'province' => $request->province,
        ]);
        
        // Handle cover image upload
        if ($request->hasFile('cover_image')) {
            $workspace->setCoverImage($request->file('cover_image'));
        }
        
        // Handle description images upload
        if ($request->hasFile('description_images')) {
            $workspace->addDescriptionImages($request->file('description_images'));
        }
        
        return redirect()->route('admin.workspace')->with('success', 'Workspace created successfully');
    }

    public function detail(Workspace $workspace)
    {
        // Load related rooms and tables
        $workspace->load(['rooms', 'tables']);
        
        return view('admin.workspace-detail', compact('workspace'));
    }
    
    public function addDescriptionImages(Request $request, Workspace $workspace)
    {
        $request->validate([
            'description_images.*' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        
        if ($request->hasFile('description_images')) {
            $workspace->addDescriptionImages($request->file('description_images'));
        }
        
        return redirect()->back()->with('success', 'Description images uploaded successfully.');
    }
    
    public function setCoverImage(Request $request, Workspace $workspace)
    {
        $request->validate([
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        
        if ($request->hasFile('cover_image')) {
            $workspace->setCoverImage($request->file('cover_image'));
        }
        
        return redirect()->back()->with('success', 'Cover image updated successfully.');
    }
    
    public function removeDescriptionImage(Workspace $workspace, $index)
    {
        $workspace->removeDescriptionImage($index);
        return response()->json(['success' => true]);
    }
}
