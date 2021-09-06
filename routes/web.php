<?php

use App\Http\Controllers\QuestionnaireController;
use App\Http\Controllers\QuestionnaireResultController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/questionnaires', [QuestionnaireController::class, 'create'])
    ->middleware('auth')
    ->name('questionnaires');

Route::post('/questionnaires', [QuestionnaireController::class, 'store'])
    ->middleware('auth')
    ->name('submit-questionnaire');

Route::get('/results', [QuestionnaireResultController::class, 'index'])
    ->middleware('auth')
    ->name('results');


require __DIR__.'/auth.php';
