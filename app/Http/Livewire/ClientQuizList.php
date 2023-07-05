<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Quiz;
use Livewire\Component;

class ClientQuizList extends Component
{
    public $quizzes;

    public function mount()
    {
        // Here it's actually supposed to get the current logged in client
        $client = Client::first();
        $this->quizzes = Quiz::whereClientId($client->id)->get();
    }

    public function render()
    {
        return view('livewire.client-quiz-list');
    }
}
