<?php

namespace App\Http\Livewire;

use App\Models\Route;
use Livewire\Component;

class RoutesList extends Component
{
    public $routes;

    protected $listeners = ['refreshList'];

    public function mount()
    {
        $this->setRoutes();
    }

    public function refreshList()
    {
        $this->setRoutes();
    }

    public function setRoutes()
    {
        $this->routes = Route::with('destinations')->latest()->get();
    }

    public function edit(int $id)
    {
        $this->emit('readyToEdit', $id);
    }

    public function delete(int $id)
    {
        $this->emit('setAction', 'create');

        $route = Route::findOrFail($id);
        $route->destinations()->detach();
        $route->delete();

        $this->setRoutes();
    }

    public function render()
    {
        return view('livewire.routes-list', ['routes' => $this->routes->toArray()]);
    }
}
