<?php

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

Route::get('/test',function (){
   return Question::find(1)->answers;
});

Route::get('/', function () {
    return redirect('questions');
});

Route::get('/dashboard', function () {
    return redirect('questions');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function (){
//    Questions routes
Route::resource('questions',QuestionController::class);

});

require __DIR__.'/auth.php';
