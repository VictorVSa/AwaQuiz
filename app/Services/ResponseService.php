<?php

namespace App\Services;

use App\Models\Response;

class ResponseService
{
    public function submitResponse($quizId, $clientId, $data): void
    {
        foreach ($data as $questionId => $response) {
            if (is_array($response)) {
                $response = json_encode(array_values($response));
            }
            Response::create([
                'client_id' => $clientId,
                'quiz_id' => $quizId, // If you want to track which user answered
                'question_id' => $questionId,
                'submitted_answer' => $response,
            ]);
        }
    }
}
