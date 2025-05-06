<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Table;
use Illuminate\Http\Request;

class AdminTableController extends Controller
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
        
        $table = Table::create($request->except('cover_image'));
        
        if ($request->hasFile('cover_image')) {
            $table->setCoverImage($request->file('cover_image'));
        }
        
        return redirect()->back()->with('success', 'Table created successfully');
    }
    
    public function edit(Table $table)
    {
        return response()->json($table);
    }
    
    public function update(Request $request, Table $table)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'max_capacity' => 'required|integer|min:1',
            'starting_price' => 'required|integer|min:0',
            'is_smoking' => 'required|boolean',
            'book_type' => 'required|boolean',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        
        $table->update($request->except('cover_image'));
        
        if ($request->hasFile('cover_image')) {
            $table->setCoverImage($request->file('cover_image'));
        }
        
        return redirect()->back()->with('success', 'Table updated successfully');
    }
    
    public function destroy(Table $table)
    {
        $table->delete();
        return redirect()->back()->with('success', 'Table deleted successfully');
    }
}
