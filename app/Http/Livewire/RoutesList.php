<?php

namespace App\Http\Livewire;

use App\Models\Route;

class RoutesList extends ItemsList
{
    public $routes;

    public function setItems()
    {
        $this->routes = Route::with('destinations')->latest()->get();
    }

    public function deleteItem(int $id)
    {
        $route = Route::findOrFail($id);
        $route->destinations()->detach();
        $route->delete();
    }

    public function render()
    {
        return view('livewire.routes-list', ['routes' => $this->routes->toArray()]);
    }
}
