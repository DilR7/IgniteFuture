<?php

use App\Http\Middleware\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;



// Route::get('/', function () {
//     if (Auth::check() && Auth::user()->hasRole('admin')) {
//         return redirect('/admin/dashboard');
//     }

//     return app(HomeController::class)->index();
// })->name('home');

use App\Http\Controllers\QuestionController;

Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('home');
    Route::get('/logout', 'logout')->name('logout');
});

Route::middleware(['auth', 'role:user'])->group(function(){
    Route::controller(ModuleController::class)->group(function(){
        Route::get('/modules','index')->name('modules');
        Route::get('/modules/{slug}', 'moduleCategory')->name('modulecategory');
        Route::get('/ranking', 'ranking')->name('ranking');
    });

    Route::controller(ContentController::class)->group(function(){
        Route::post('/modules/{slug}/content', 'index')->name('contents');
        Route::get('/content/{slug}', 'otherContent')->name('othercontents');
        Route::get('/modules/{module_id}/mycontent', 'myContent')->name('mycontents');
        Route::post('/contents/{id}/mark-watched', 'markAsWatched')->name('contents.markWatched');
    });

    Route::controller(EnrollmentController::class)->group(function(){
        Route::post('/enroll/{moduleId}', [EnrollmentController::class, 'enroll'])->name('enroll');
    });

    Route::controller(BookController::class)->group(function(){
        Route::get('/book','index')->name('books');
        Route::get('/book/{slug}', 'readBook')->name('readbook');
    });

    Route::controller(QuizController::class)->group(function(){
        Route::get('/quiz','index')->name('quiz');
        Route::get('/quizzes/{slug}','quizCategory')->name('quizcategory');
        Route::get('/start/{id}', 'quizStart')->name('quizstart');
    });

    Route::controller(QuestionController::class)->group(function(){
        Route::get('/question/{id}', 'index')->name('question');
        Route::post('/submit-quiz', [QuestionController::class, 'submitQuiz'])->name('submit.quiz');
    });
});


Route::middleware(['auth', 'role:admin'])->group(function() {

    Route::controller(ModuleController::class)->group(function(){
        Route::get('/modules','index')->name('modules');
        Route::get('/modules/{slug}', 'moduleCategory')->name('modulecategory');
        Route::get('/ranking', 'ranking')->name('ranking');
    });

    Route::controller(ContentController::class)->group(function(){
        Route::post('/modules/{slug}/content', 'index')->name('contents');
        Route::get('/content/{slug}', 'otherContent')->name('othercontents');
        Route::get('/modules/{module_id}/mycontent', 'myContent')->name('mycontents');
        Route::post('/contents/{id}/mark-watched', 'markAsWatched')->name('contents.markWatched');
    });

    Route::controller(EnrollmentController::class)->group(function(){
        Route::post('/enroll/{moduleId}', [EnrollmentController::class, 'enroll'])->name('enroll');
    });

    Route::controller(BookController::class)->group(function(){
        Route::get('/book','index')->name('books');
        Route::get('/book/{slug}', 'readBook')->name('readbook');
    });

    Route::controller(QuizController::class)->group(function(){
        Route::get('/quiz','index')->name('quiz');
        Route::get('/quizzes/{slug}','quizCategory')->name('quizcategory');
        Route::get('/start/{id}', 'quizStart')->name('quizstart');
    });

    Route::controller(QuestionController::class)->group(function(){
        Route::get('/question/{id}', 'index')->name('question');
        Route::post('/submit-quiz', [QuestionController::class, 'submitQuiz'])->name('submit.quiz');
    });

    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/module', function () {
            return view('admin.module');
        })->name('admin.module');

        Route::get('/adminbook', 'viewBook')->name('adminbook');
        Route::get('/admincontent', 'viewContent')->name('admincontent');

        Route::get('/module', 'viewModule')->name('adminmodule');
        Route::get('/module/add', 'addModuleForm')->name('addModuleForm');
        Route::post('/module/store', 'storeModule')->name('storeModule');
        Route::get('/module/edit/{id}', 'editModuleForm')->name('editModuleForm');
        Route::post('/module/update/{id}', 'updateModule')->name('updateModule');
        Route::post('/module/delete/{id}', 'deleteModule')->name('deleteModule');

        Route::get('/manageuser', 'viewUser')->name('manageuser');
        Route::get('/adminquiz', 'viewQuiz')->name('adminquiz');
        Route::get('/adminbook/bookcreate', 'BookCreate')->name('adminbook.create');
        Route::post('/adminbook', 'postBook')->name('adminbook.store');
    });
});


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


require __DIR__.'/auth.php';
