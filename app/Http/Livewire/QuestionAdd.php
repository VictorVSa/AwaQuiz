<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Enums\QuestionType;
use App\Models\Category;
use App\Services\QuestionService;
use Illuminate\Validation\Rule;

class QuestionAdd extends Component
{
    public $type;
    public $text;
    public $options = [];
    public $correctAnswers = [];
    public $correctOrder = [];

    public function render()
    {
        return view('livewire.question-add');
    }

    public function addOption(): void
    {
        if ($this->type === QuestionType::Multiple->value) {
            $this->options[] = '';
        } elseif ($this->type === QuestionType::Order->value) {
            $this->correctOrder[] = '';
        }
    }

    public function removeOption($index): void
    {
        if ($this->type === 'multiple') {
            unset($this->options[$index]);
            $this->options = array_values($this->options);
        } elseif ($this->type === 'order') {
            unset($this->correctOrder[$index]);
            $this->correctOrder = array_values($this->correctOrder);
        }
    }

    public function createQuestion(): void
    {
        $this->validate([
            'type' => ['required', Rule::in(array_column(QuestionType::cases(), 'value'))],
            'text' => 'required',
            'options' => 'array',
            'correctAnswers' => 'array'
        ]);

        $answerType = function (QuestionType $type) {
            return match ($type) {
                QuestionType::Multiple => (object) $this->correctAnswers,
                QuestionType::Order => $this->correctOrder
            };
        };

        $data = [
            'type' => $this->type,
            'category_id' => Category::first()->id,
            'text' => $this->text,
            'options' => $this->options,

            // This is saved as {"0": true, "1": true, "2": false} for example
            'correct_answers' => $answerType(QuestionType::from($this->type)),
        ];

        $questionService = new QuestionService();
        $questionService->createQuestion($data);

        session()->flash('message', 'Question successfully created.');
        $this->reset(['type', 'text', 'options', 'correctAnswers', 'correctOrder']);
    }
}
