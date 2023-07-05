<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    protected $fillable = ['quiz_id', 'category_id', 'type', 'text', 'options', 'correct_answers'];
    protected $casts = ['options' => 'array', 'correct_answers' => 'array'];

    public function quizzes(): BelongsToMany
    {
        return $this->belongsToMany(Quiz::class, table: 'quiz_question');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'question_tags');
    }

    public function responses(): HasMany
    {
        return $this->hasMany(Response::class);
    }
}
