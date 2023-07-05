<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;

class ClientTable extends Component
{
    public $clients;

    public function mount()
    {
        $this->clients = Client::all();
    }
    public function render()
    {
        return view('livewire.client-table');
    }
}
