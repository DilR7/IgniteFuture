<?php

use App\Http\Middleware\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;

Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('home');
    Route::get('/logout', 'logout')->name('logout');
});
Route::middleware(['auth', 'role:user,admin'])->group(function(){
    Route::get('/profile', [UserController::class, 'index'])->name('profileE');
    Route::post('/profile', [UserController::class, 'update'])->name('profileupdate');

    Route::controller(ModuleController::class)->group(function(){
        Route::get('/modules','index')->name('modules');
        Route::get('/modules/{slug}', 'moduleCategory')->name('modulecategory');
        Route::get('/ranking', 'ranking')->name('ranking');
    });

    Route::controller(ContentController::class)->group(function(){
        Route::get('/modules/{module_id}/content', 'index2')->name('content');
        Route::post('/modules/{slug}/contents', 'index')->name('contents');
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
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/module', function () {
            return view('admin.module');
        })->name('admin.module');

        // CRUD Book
        Route::get('/adminbook', 'viewBook')->name('adminbook');
        Route::get('/adminbook/create', 'BookCreate')->name('admin.adminbookcreate'); 
        Route::post('/adminbook', 'postBook')->name('adminbook.store');
        Route::delete('/adminbook/{id}', 'deleteBook')->name('adminbook.delete');
        Route::get('/adminbook/edit/{id}', 'editBook')->name('adminbook.edit');
        Route::put('/adminbook/update/{id}', 'updateBook')->name('adminbook.update');

         // CRUD Content
        Route::get('/admincontent', 'viewContent')->name('admincontent');
        Route::get('/admincontent/create', 'ContentCreate')->name('admin.admincontentcreate'); 
        Route::post('/admincontent', 'postContent')->name('admincontent.store');
        Route::delete('/admincontent/{id}', 'deleteContent')->name('admincontent.delete');
        Route::get('/admincontent/edit/{id}', 'editContent')->name('admincontent.edit');
        Route::put('/admincontent/update/{id}', 'updateContent' )->name('admincontent.update');

        //CRUD Module
        Route::get('/module', 'viewModule')->name('adminmodule');
        Route::get('/module/add', 'addModuleForm')->name('addModuleForm');
        Route::post('/module/store', 'storeModule')->name('storeModule');
        Route::get('/module/edit/{id}', 'editModuleForm')->name('editModuleForm');
        Route::put('/module/update/{id}', 'updateModule')->name('updateModule');
        Route::post('/module/delete/{id}', 'deleteModule')->name('deleteModule');

        //CRUD Quiz
        Route::get('/adminquiz', 'viewQuiz')->name('adminquiz');
        Route::get('/adminquiz/add','QuizCreate')->name('adminquiz.add');
        Route::post('/adminquiz/store','postQuiz')->name('adminquiz.post');
        Route::get('/adminquiz/edit/{id}','editQuiz')->name('adminquiz.edit');
        Route::put('/adminquiz/update/{id}','updateQuiz')->name('adminquiz.update');
        Route::delete('/adminquiz/delete/{id}','deleteQuiz')->name('adminquiz.delete');

        Route::get('/manageuser', 'viewUser')->name('manageuser');
    });
});

require __DIR__.'/auth.php';
