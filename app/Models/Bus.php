<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bus extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function bookings()
    {
        return $this->belongsToMany(User::class, 'bookings')->using(Booking::class)->withTimestamps();
    }

    public function book(User $user)
    {
        $this->bookings()->attach($user);
    }

    protected function remainingSeats(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->seats_available - $this->bookings()->count(),
        );
    }
}
