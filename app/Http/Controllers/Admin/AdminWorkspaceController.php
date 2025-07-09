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
            'phone' => $this->formatPhoneNumber($request->phone),
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

    public function export()
    {
        $workspaces = Workspace::all();
        
        // Create a timestamp for the filename
        $timestamp = now()->format('Y-m-d_H-i-s');
        $filename = "spacehub_workspaces_export_{$timestamp}.json";
        
        // Return JSON response with download headers
        return response()->json($workspaces)
            ->header('Content-Disposition', "attachment; filename=\"{$filename}\"")
            ->header('Content-Type', 'application/json');
    }

    public function update(Request $request, Workspace $workspace)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Add other validations as needed
        ]);
        
        $requestData = $request->all();
        if (isset($requestData['phone'])) {
            $requestData['phone'] = $this->formatPhoneNumber($requestData['phone']);
        }
        
        $workspace->update($requestData);
        
        return redirect()->back()->with('success', 'Workspace updated successfully');
    }
    
    /**
     * Format phone number to use country code.
     * Converts leading 0 to Indonesia's country code 62
     *
     * @param string|null $phoneNumber
     * @return string|null
     */
    private function formatPhoneNumber(?string $phoneNumber): ?string
    {
        if (empty($phoneNumber)) {
            return $phoneNumber;
        }
        
        // Remove any spaces, dashes, or parentheses
        $phoneNumber = preg_replace('/[\\s\\-\\(\\)]/', '', $phoneNumber);
        
        // Remove leading '+' if it exists
        if (substr($phoneNumber, 0, 1) === '+') {
            $phoneNumber = substr($phoneNumber, 1);
        }
        
        // If the phone number starts with 0, replace it with 62
        if (substr($phoneNumber, 0, 1) === '0') {
            return '62' . substr($phoneNumber, 1);
        }
        
        // If it already starts with 62, return as is
        if (substr($phoneNumber, 0, 2) === '62') {
            return $phoneNumber;
        }
        
        // Otherwise, return as is
        return $phoneNumber;
    }
}
