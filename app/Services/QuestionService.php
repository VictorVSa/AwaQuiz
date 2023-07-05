<?php

namespace App\Services;

use App\Models\Question;

class QuestionService
{
    public function createQuestion($data): Question
    {
        return Question::create($data, ['category_id' => 1]);
    }
}
