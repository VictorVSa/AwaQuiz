<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Services\QuizService;
use App\Models\Question;
use Livewire\Component;

class QuizAdd extends Component
{
    public $name;

    public $clients;
    public $selectedClient;

    public $questions;
    public $availableQuestions;
    public $selectedQuestions = [];

    protected $rules = [
        'name' => 'required|min:3',
        'selectedClient' => 'required',
        'selectedQuestions' => 'array|min:1'
    ];

    public function mount()
    {
        $this->clients = Client::all();
        $this->selectedClient = $this->clients->first()->id;
        $this->availableQuestions = Question::all()->pluck('id')->toArray();
    }

    public function render()
    {
        return view('livewire.quiz-add');
    }

    public function selectQuestion(int $id)
    {
        $this->availableQuestions = array_diff($this->availableQuestions, [$id]);
        $this->selectedQuestions[] = $id;
    }

    public function removeQuestion(int $id)
    {
        $this->selectedQuestions = array_diff($this->selectedQuestions, [$id]);
        $this->availableQuestions[] = $id;
    }

    public function createQuiz()
    {
        $validatedData = $this->validate();

        $quizService = new QuizService();
        $newQuiz = $quizService->createQuiz($validatedData);

        if (!$newQuiz) {
            session()->flash('message', 'There was an error while creating the quiz');
            return;
        }

        session()->flash('message', 'Quiz successfully created.');
        return redirect()->to('/admin');
    }
}
