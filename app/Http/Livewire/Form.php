<?php

namespace App\Http\Livewire;

use Livewire\Component;

abstract class Form extends Component
{
    public $action = 'create';
    public $itemToEdit = null;

    protected $listeners = ['readyToEdit', 'setAction'];

    public function save()
    {
        return $this->{$this->action}();
    }

    abstract public function readyToEdit(int $itemId);
    abstract public function setAction($action);
    abstract public function render();
    abstract protected function create();
    abstract protected function edit();
}
