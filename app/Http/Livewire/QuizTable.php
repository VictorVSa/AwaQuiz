<?php

namespace App\Http\Livewire;

use App\Models\Quiz;
use Livewire\Component;

class QuizTable extends Component
{
    public $quizzes;

    public function mount()
    {
        $this->quizzes = Quiz::all();
    }

    public function render()
    {
        return view('livewire.quiz-table');
    }
}
