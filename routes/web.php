<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\AdminPanel;
use App\Http\Livewire\QuizAdd;
use App\Http\Livewire\QuestionAdd;

use App\Http\Livewire\ClientPanel;
use App\Http\Livewire\ClientQuiz;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::prefix('admin')->group(function () {
    Route::get('/', AdminPanel::class);
    Route::get('/quiz-add', QuizAdd::class);
    Route::get('/question-add', QuestionAdd::class);
});

Route::prefix('client')->group(function () {
    Route::get('/', ClientPanel::class);
    Route::get('/quiz/{quiz}', ClientQuiz::class)->name('start-quiz');
    Route::get('/question-add', QuestionAdd::class);
});
