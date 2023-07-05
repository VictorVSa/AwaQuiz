<?php
namespace App\Enums;

enum QuestionType: string
{
    case Multiple = 'multiple';
    case Order = 'order';
    case Drag = 'drag';
}
