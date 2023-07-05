<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Question;

class QuestionTable extends Component
{
    public $questions;

    public function mount()
    {
        $this->questions = Question::all();
    }

    public function render()
    {
        return view('livewire.question-table');
    }
}
