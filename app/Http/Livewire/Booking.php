<?php

namespace App\Http\Livewire;

use App\Models\Bus;
use Livewire\Component;
use App\Models\Destination;

class Booking extends Component
{
    public $destinations;
    public $selectedDestination;
    public $routes = null;

    public function search()
    {
        $this->validate(['selectedDestination' => 'required|integer|exists:destinations,id']);

        $destination = Destination::with('routes.buses')->findOrFail($this->selectedDestination);
        $this->routes = $destination->routes;
    }

    public function book(Bus $bus)
    {
        if (auth()->guest()) {
            abort(403);
        }

        $bus->book(auth()->user());
    }

    public function render()
    {
        return view('livewire.booking');
    }
}
