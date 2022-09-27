<?php

namespace App\Http\Livewire;

use App\Models\Bus;

class BusesList extends ItemsList
{
    public $buses;

    public function setItems()
    {
        $this->buses = Bus::with('route')->latest()->get();
    }

    public function deleteItem(int $id)
    {
        $bus = Bus::findOrFail($id);
        $bus->bookings()->detach();
        $bus->delete();
    }

    public function render()
    {
        return view('livewire.buses-list');
    }
}
