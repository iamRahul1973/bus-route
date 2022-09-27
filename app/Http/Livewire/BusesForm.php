<?php

namespace App\Http\Livewire;

use App\Models\Bus;
use App\Models\Route;
use Livewire\Component;

class BusesForm extends Form
{
    public $routes;
    public $name;
    public $seats_available;
    public $route_id;

    protected $rules = [
        'name' => 'required|string|min:2|max:191',
        'seats_available' => 'required|integer|max:150',
        'route_id' => 'required|integer|exists:routes,id'
    ];

    public function mount()
    {
        $this->routes = Route::latest()->get();
    }

    public function readyToEdit(int $itemId)
    {
        $this->setAction('edit');

        $bus = Bus::findOrFail($itemId);
        $this->itemToEdit = $bus;

        $this->name = $bus->name;
        $this->seats_available = $bus->seats_available;
        $this->route_id = $bus->route_id;
    }

    public function setAction($action)
    {
        if ($action === 'create') {
            $this->resetExcept(['action', 'routes']);
        }

        $this->action = $action;
    }

    public function render()
    {
        return view('livewire.buses-form');
    }

    protected function create()
    {
        $validated = $this->validate();

        Bus::create($validated);

        $this->reset(['name', 'seats_available', 'route_id']);
        $this->emit('refreshList');
    }

    protected function edit()
    {
        $this->validate();

        $this->itemToEdit->name = $this->name;
        $this->itemToEdit->seats_available = $this->seats_available;
        $this->itemToEdit->route_id = $this->route_id;
        $this->itemToEdit->save();

        $this->setAction('create');
        $this->emit('refreshList');
    }
}
