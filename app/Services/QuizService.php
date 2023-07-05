<?php

namespace App\Services;

use App\Models\Quiz;

class QuizService
{
    public function createQuiz($data)
    {
        $quiz = new Quiz;
        $quiz->name = $data['name'];
        $quiz->client()->associate($data['selectedClient']);
        $quiz->save();

        $quiz->questions()->attach($data['selectedQuestions']);

        return $quiz;
    }
}
