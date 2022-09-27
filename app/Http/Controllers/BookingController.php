<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function show()
    {
        $destinations = Destination::latest()->get();
        return view('booking', compact('destinations'));
    }
}
