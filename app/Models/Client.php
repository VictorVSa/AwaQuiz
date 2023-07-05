<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name'];

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
