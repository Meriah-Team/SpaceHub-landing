<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'latitude',
        'longitude',
        'instagram', // lowercase
        'tiktok',    // lowercase
        'facilities',
        'description',
        'city',
        'province',
    ];
    
    protected $casts = [
        'facilities' => 'array',
    ];
    
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
