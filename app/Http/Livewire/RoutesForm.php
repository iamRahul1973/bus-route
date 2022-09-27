<?php

namespace App\Http\Livewire;

use App\Models\Route;
use App\Models\Destination;

class RoutesForm extends Form
{
    public $destinations;
    public $name;
    public $selectedDestinations = [];

    protected $rules = [
        'name' => 'required|string|min:2|max:191',
        'selectedDestinations' => 'required|array' // TODO: Make sure all values are present in DB
    ];

    public function mount()
    {
        $this->destinations = Destination::all();
    }

    public function readyToEdit(int $itemId)
    {
        $this->setAction('edit');

        $route = Route::findOrFail($itemId);
        $this->itemToEdit = $route;

        $this->name = $route->name;
        $this->selectedDestinations = $route->destinations->pluck('id')->toArray();
    }

    public function setAction($action)
    {
        if ($action === 'create') {
            $this->resetExcept(['action', 'destinations']);
        }

        $this->action = $action;
    }

    public function render()
    {
        return view('livewire.routes-form');
    }

    protected function create()
    {
        $this->validate();

        $route = Route::create(['name' => $this->name]);
        $route->destinations()->attach($this->selectedDestinations);

        $this->reset(['name', 'selectedDestinations']);
        $this->emit('refreshList');
    }

    protected function edit()
    {
        $this->validate();

        $this->itemToEdit->name = $this->name;
        $this->itemToEdit->save();

        $this->itemToEdit->destinations()->sync($this->selectedDestinations);

        $this->setAction('create');
        $this->emit('refreshList');
    }
}
