<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Workspace extends Model
{
    protected $fillable = [
        'name',
        'address',
        'opening_time',
        'closing_time',
        'phone',
        'maps',
        'email',
        'instagram',
        'tiktok',
        'facilities',
        'description',
        'cover_image',
        'description_images',
    ];
    
    protected $casts = [
        'facilities' => 'array',
        'description_images' => 'array',
    ];
    
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    
    public function tables()
    {
        return $this->hasMany(Table::class);
    }
    
    // Cover image methods
    public function setCoverImage($imageFile)
    {
        // Delete old cover image if exists
        if ($this->cover_image && Storage::disk('public')->exists($this->cover_image)) {
            Storage::disk('public')->delete($this->cover_image);
        }
        
        $filename = 'cover_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
        $path = $imageFile->storeAs("workspaces/{$this->id}", $filename, 'public');
        
        $this->cover_image = $path;
        $this->save();
        
        return $path;
    }
    
    public function getCoverImageUrl()
    {
        return $this->cover_image 
            ? asset('storage/' . $this->cover_image) 
            : asset('images/default-workspace.jpg');
    }
    
    // Description images methods
    public function addDescriptionImages(array $imageFiles)
    {
        $paths = $this->description_images ?? [];
        
        foreach ($imageFiles as $image) {
            $filename = uniqid() . '_' . $image->getClientOriginalName();
            $path = $image->storeAs("workspaces/{$this->id}/description", $filename, 'public');
            $paths[] = $path;
        }
        
        $this->description_images = $paths;
        $this->save();
        
        return $paths;
    }
    
    public function getDescriptionImageUrls()
    {
        return array_map(function($img) {
            return asset('storage/'.$img);
        }, $this->description_images ?? []);
    }
    
    public function removeDescriptionImage($index)
    {
        $images = $this->description_images ?? [];
        if (isset($images[$index])) {
            Storage::disk('public')->delete($images[$index]);
            array_splice($images, $index, 1);
            $this->description_images = $images;
            $this->save();
        }
    }
}
