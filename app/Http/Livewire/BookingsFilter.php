<?php

namespace App\Http\Livewire;

use App\Models\Booking;
use Livewire\Component;

class BookingsFilter extends Component
{
    public $bookings;

    public function mount()
    {
        // TODO: Filter
        $this->bookings = Booking::with('bus.route.destinations', 'user')->latest()->get();
    }

    public function render()
    {
        return view('livewire.bookings-filter');
    }
}
