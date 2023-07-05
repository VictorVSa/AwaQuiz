<?php

namespace App\Http\Livewire;

use App\Models\Quiz;
use App\Services\ResponseService;
use Livewire\Component;

class ClientQuiz extends Component
{
    public $questions;
    public $quiz;
    public $userResponses = [];

    public function mount(Quiz $quiz)
    {
        // There should be some authorization here to check that the quiz is accessible by the user
        $this->quiz = $quiz;
        $this->questions = $quiz->questions;
    }

    public function render()
    {
        return view('livewire.client-quiz');
    }

    public function submitQuiz(): void
    {
        $responseService = new ResponseService();
        $responseService->submitResponse($this->quiz->id, $this->quiz->client->id, $this->userResponses);
    }
}
