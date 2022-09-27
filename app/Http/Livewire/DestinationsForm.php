<?php

namespace App\Http\Livewire;

use App\Models\Destination;

class DestinationsForm extends Form
{
    public $name;
    public $fees;

    protected $rules = [
        'name' => 'required|string|min:2|max:191',
        'fees' => 'required|numeric'
    ];

    public function readyToEdit(int $itemId)
    {
        $this->setAction('edit');

        $destination = Destination::findOrFail($itemId);
        $this->itemToEdit = $destination;

        $this->name = $destination->name;
        $this->fees = $destination->fees;
    }

    public function setAction($action)
    {
        if ($action === 'create') {
            $this->resetExcept('action');
        }

        $this->action = $action;
    }

    public function render()
    {
        return view('livewire.destinations-form');
    }

    protected function create()
    {
        $validated = $this->validate();

        Destination::create($validated);

        $this->reset();
        $this->emit('refreshList');
    }

    protected function edit()
    {
        $this->validate();

        $this->itemToEdit->name = $this->name;
        $this->itemToEdit->fees = $this->fees;
        $this->itemToEdit->save();

        $this->setAction('create');
        $this->emit('refreshList');
    }
}
