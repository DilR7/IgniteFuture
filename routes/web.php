<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('testing.Halaman1');
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
Route::post('/quizzes', [QuizController::class, 'store'])->name('quizzes.store');
Route::get('/quizzes/{quizID}/edit', [QuizController::class, 'edit'])->name('quizzes.edit');
Route::put('/quizzes/{quizID}', [QuizController::class, 'update'])->name('quizzes.update');
Route::delete('/quizzes/{quizID}', [QuizController::class, 'delete'])->name('quizzes.delete');


Route::get('/quizzes/{quizID}/questions', [QuizController::class, 'question'])->name('testing.questions');

Route::get('/modules/{moduleID}/books', [BookController::class, 'index'])->name('modules.books');
Route::get('/books/{bookID}', [BookController::class, 'show'])->name('books.show');

Route::get('modules/{moduleID}/contents', [ContentController::class, 'index'])->name('modules.contents');
Route::get('contents/{contentID}', [ContentController::class, 'show'])->name('contents.show');

require __DIR__.'/auth.php';
