<?php

use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\TravelsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Форма входа
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Выход
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/travels');
    }
    return view('welcome');
});

// Защищенные маршруты
Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'travels'], static function () {
        Route::get('/', function () {
            return view('travels');
        });
        Route::get('/{id}', [TravelsController::class, 'get'])
            ->where(['id' => '[0-9]+']);
        Route::get('/list', [TravelsController::class, 'list']);
        Route::post('/save', [TravelsController::class, 'save']);
        Route::post('/delete', [TravelsController::class, 'delete']);
    });

    Route::group(['prefix' => 'documents'], static function () {
        Route::get('/list', [DocumentsController::class, 'list']);
        Route::post('/save', [DocumentsController::class, 'save']);
        Route::post('/delete', [DocumentsController::class, 'delete']);
    });
});
