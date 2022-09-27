<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Booking extends Pivot
{
    use HasFactory;

    protected $table = 'bookings';
    public $incrementing = true;

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
