<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Table extends Model
{
    protected $fillable = [
        'name',
        'workspace_id',
        'is_smoking',
        'starting_price',
        'book_type',
        'max_capacity',
        'cover_image',
    ];
    
    protected $casts = [
        'is_smoking' => 'boolean',
        'book_type' => 'boolean',
    ];
    
    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }
    
    // Cover image methods
    public function setCoverImage($imageFile)
    {
        // Delete old cover image if exists
        if ($this->cover_image && Storage::disk('public')->exists($this->cover_image)) {
            Storage::disk('public')->delete($this->cover_image);
        }
        
        $filename = 'cover_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
        $path = $imageFile->storeAs("workspaces/{$this->workspace_id}/tables/{$this->id}", $filename, 'public');
        
        $this->cover_image = $path;
        $this->save();
        
        return $path;
    }
    
    public function getCoverImageUrl()
    {
        return $this->cover_image 
            ? asset('storage/' . $this->cover_image) 
            : asset('images/default-table.jpg');
    }
}
