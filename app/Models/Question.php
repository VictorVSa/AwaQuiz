<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['quiz_id', 'category_id', 'type', 'text', 'options', 'correct_answers'];
    protected $casts = ['options' => 'array', 'correct_answers' => 'array'];

    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class, table: 'quiz_question');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'question_tags');
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}
