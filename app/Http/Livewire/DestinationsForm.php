<?php

namespace App\Http\Livewire;

use App\Models\Destination;
use Livewire\Component;

class DestinationsForm extends Component
{
    public $name;
    public $fees;
    public $action = 'create';
    public $itemToEdit = null;

    protected $rules = [
        'name' => 'required|string|min:2|max:191',
        'fees' => 'required|numeric'
    ];

    protected $listeners = ['readyToEdit', 'setAction'];

    public function save()
    {
        return $this->{$this->action}();
    }

    public function readyToEdit(Destination $destination)
    {
        $this->setAction('edit');
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

    private function create()
    {
        $validated = $this->validate();

        Destination::create($validated);

        $this->reset();
        $this->emit('refreshDestinationsList');
    }

    private function edit()
    {
        $this->validate();

        $this->itemToEdit->name = $this->name;
        $this->itemToEdit->fees = $this->fees;
        $this->itemToEdit->save();

        $this->setAction('create');
        $this->emit('refreshDestinationsList');
    }
}
