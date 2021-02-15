<?php

use App\Http\Controllers\AnswersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Models\Question;
use App\Models\User;
use App\Models\Answer;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/test', function () {
    return Question::find(1)->answers;
});

Route::post('/createAnswer', function () {
    Answer::create([
        'user_id' => Auth::id(),
        'question_id' => 1,
        'body' => 'What a Great Question!'
    ]);
});

Route::get('/', function () {
    return redirect('questions');
});

Route::get('/dashboard', function () {
    return redirect('questions');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
//    Questions routes
    Route::resource('questions', QuestionController::class);
// Answers routes
    Route::post('question/{id}/create-answer', [AnswersController::class, 'store'])->name('question.answer.store');
    Route::get('question/{question:id}/answer/{answer:id}/edit', [AnswersController::class, 'edit'])->name('question.answer.edit');
    Route::put('question/{question:id}/answer/{answer:id}/update', [AnswersController::class, 'update'])->name('question.answer.update');
    Route::delete('question/{question:id}/answer/{answer:id}/delete', [AnswersController::class, 'destroy'])->name('question.answer.delete');


});

require __DIR__ . '/auth.php';
