<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    public function destinations()
    {
        return $this->belongsToMany(Destination::class);
    }

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }
}
