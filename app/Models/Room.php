<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'workspace_id',
    ];
    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }
}
