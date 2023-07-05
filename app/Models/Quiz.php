<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ['name', 'client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, table: 'quiz_question');
    }
}
