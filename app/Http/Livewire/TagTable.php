<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class TagTable extends Component
{
    public $tags;

    public function mount()
    {
        $this->tags = Tag::all();
    }

    public function render()
    {
        return view('livewire.tag-table');
    }
}
