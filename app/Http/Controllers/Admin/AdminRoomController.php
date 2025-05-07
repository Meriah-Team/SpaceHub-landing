<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'workspace_id' => 'required|exists:workspaces,id',
            'max_capacity' => 'required|integer|min:1',
            'starting_price' => 'required|integer|min:0',
            'is_smoking' => 'required|boolean',
            'book_type' => 'required|boolean',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        
        $room = Room::create($request->except('cover_image'));
        
        if ($request->hasFile('cover_image')) {
            $room->setCoverImage($request->file('cover_image'));
        }
        
        return redirect()->back()->with('success', 'Room created successfully');
    }
    
    public function edit(Room $room)
    {
        return response()->json($room);
    }
    
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'max_capacity' => 'required|integer|min:1',
            'starting_price' => 'required|integer|min:0',
            'is_smoking' => 'required|boolean',
            'book_type' => 'required|boolean',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        
        $room->update($request->except('cover_image'));
        
        if ($request->hasFile('cover_image')) {
            $room->setCoverImage($request->file('cover_image'));
        }
        
        return redirect()->back()->with('success', 'Room updated successfully');
    }
    
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->back()->with('success', 'Room deleted successfully');
    }
}
