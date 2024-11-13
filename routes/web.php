<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('home');
});

Route::controller(ModuleController::class)->group(function(){
    Route::get('/modules','index')->name('modules');
    Route::get('/modules/{slug}', 'moduleCategory')->name('modulecategory');
});
 
Route::controller(BookController::class)->group(function(){
    Route::get('/book','index')->name('books');
    Route::get('/book/{slug}', 'readBook')->name('readbook');
});
 
Route::controller(QuizController::class)->group(function(){
    Route::get('/quiz','index')->name('quiz');
    // Route::get('/start/{slug}','quizCategory')->name('quizstart');
    Route::get('/start/{id}', 'quizCategory')->name('quizstart');
    Route::get('/question','quizquestion')->name('question');
});

// Route::get('/quiz', [QuizController::class, 'index'])->name('quiz');


//book
Route::get('/book-preview', function(){
    return view('user.bookpreview');
});
Route::get('/read-book', function() {
    return view('user.readingpage');
});
Route::get('/exchange-book', function(){
    return view('user.exchangebook');
});
// Route::get('/courses', function(){
//     return view('user.course');
// });
// Route::get('/quiz', function(){
//     return view('user.quiz');
// });
// Route::get('/question', function(){
//     return view('user.uestion');
// });
Route::controller(ContentController::class)->group(function(){
    Route::get('/modules/content/{slug}', 'index')->name('contents');
});

//book
// Route::get('/book-preview', function(){
//     return view('user.bookpreview');
// });
// Route::get('/read-book', function() {
//     return view('user.readingpage');
// });
// Route::get('/exchange-book', function(){
//     return view('user.exchangebook');
// });
// Route::get('/courses', function(){
//     return view('user.course');
// });

// user
// Route::get('/mains',[UserController::class,"index"]);
// Route::post('/users', [UserController::class, 'store'])->name('users.store');
// Route::get('/users/{userID}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::put('/users/{userID}', [UserController::class, 'update'])->name('users.update');
// Route::get('/users/search', [UserController::class, 'search'])->name('users.search');
// Route::delete('/users/{userID}', [UserController::class, 'delete'])->name('users.delete');

// module
// Route::get('/module',[ModuleController::class,"index"]);
// Route::post('/modules', [ModuleController::class, 'store'])->name('modules.store');
// Route::get('/module/{moduleID}/edit', [moduleController::class, 'edit'])->name('modules.edit');
// Route::put('/module/{moduleID}', [moduleController::class, 'update'])->name('modules.update');
// Route::get('/module/search', [moduleController::class, 'search'])->name('modules.search');
// Route::delete('/module/{moduleID}', [ModuleController::class, 'delete'])->name('module.delete');


// Route::get('/quizzes', [QuizController::class, 'index'])->name('quizzes.index');
// Route::post('/quizzes', [QuizController::class, 'store'])->name('quizzes.store');
// Route::get('/quizzes/{quizID}/edit', [QuizController::class, 'edit'])->name('quizzes.edit');
// Route::put('/quizzes/{quizID}', [QuizController::class, 'update'])->name('quizzes.update');
// Route::delete('/quizzes/{quizID}', [QuizController::class, 'delete'])->name('quizzes.delete');


// Route::get('/quizzes/{quizID}/questions', [QuizController::class, 'question'])->name('testing.questions');

// Route::get('/modules/{moduleID}/books', [BookController::class, 'index'])->name('modules.books');
// Route::get('/books/{bookID}', [BookController::class, 'show'])->name('books.show');

// Route::get('modules/{moduleID}/contents', [ContentController::class, 'index'])->name('modules.contents');
// Route::get('contents/{contentID}', [ContentController::class, 'show'])->name('contents.show');

require __DIR__.'/auth.php';
