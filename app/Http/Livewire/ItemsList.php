<?php

namespace App\Http\Livewire;

use Livewire\Component;

abstract class ItemsList extends Component
{
    protected $listeners = ['refreshList'];

    public function refreshList()
    {
        $this->setItems();
    }

    public function mount()
    {
        $this->setItems();
    }

    public function delete(int $id)
    {
        $this->emit('setAction', 'create');
        $this->deleteItem($id);
        $this->setItems();
    }

    public function edit(int $id)
    {
        $this->emit('readyToEdit', $id);
    }

    abstract public function setItems();
    abstract public function deleteItem(int $id);
    abstract public function render();
}
