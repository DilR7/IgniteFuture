<?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});


// user
Route::get('/mains',[UserController::class,"index"]);
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{userID}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{userID}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/search', [UserController::class, 'search'])->name('users.search');
Route::delete('/users/{userID}', [UserController::class, 'delete'])->name('users.delete');

// module
Route::get('/module',[ModuleController::class,"index"]);
Route::post('/modules', [ModuleController::class, 'store'])->name('modules.store');
Route::get('/module/{moduleID}/edit', [moduleController::class, 'edit'])->name('modules.edit');
Route::put('/module/{moduleID}', [moduleController::class, 'update'])->name('modules.update');
Route::get('/module/search', [moduleController::class, 'search'])->name('modules.search');
Route::delete('/module/{moduleID}', [ModuleController::class, 'delete'])->name('module.delete');


Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index');
Route::get('/quizzes/create', [QuizController::class, 'create'])->name('quizzes.create');
Route::post('/quizzes', [QuizController::class, 'store'])->name('quizzes.store');
Route::get('/quizzes/{quizID}/edit', [QuizController::class, 'edit'])->name('quizzes.edit');
Route::put('/quizzes/{quizID}', [QuizController::class, 'update'])->name('quizzes.update');
Route::delete('/quizzes/{quizID}', [QuizController::class, 'delete'])->name('quizzes.delete');

require __DIR__.'/auth.php';
