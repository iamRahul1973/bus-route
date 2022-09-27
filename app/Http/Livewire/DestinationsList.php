<?php

namespace App\Http\Livewire;

use App\Models\Destination;

class DestinationsList extends ItemsList
{
    public $destinations;

    public function setItems()
    {
        $this->destinations = Destination::latest()->get();
    }

    public function deleteItem(int $id)
    {
        $destination = Destination::findOrFail($id);
        $destination->routes()->detach();
        $destination->delete();
    }

    public function render()
    {
        return view('livewire.destinations-list', ['destinations' => $this->destinations->toArray()]);
    }
}
