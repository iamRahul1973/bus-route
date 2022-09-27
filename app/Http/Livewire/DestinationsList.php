<?php

namespace App\Http\Livewire;

use App\Models\Destination;
use Livewire\Component;

class DestinationsList extends Component
{
    public $destinations;

    protected $listeners = ['refreshDestinationsList'];

    public function refreshDestinationsList()
    {
        $this->setDestination();
    }

    public function mount()
    {
        $this->setDestination();
    }

    public function delete(int $id)
    {
        $this->emit('setAction', 'create');
        Destination::destroy($id);
        $this->setDestination();
    }

    public function edit(int $id)
    {
        $this->emit('readyToEdit', $id);
    }

    public function setDestination()
    {
        $this->destinations = Destination::latest()->get();
    }

    public function render()
    {
        return view('livewire.destinations-list', ['destinations' => $this->destinations->toArray()]);
    }
}
