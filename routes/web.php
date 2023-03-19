<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\ArticleController::class, 'GetLastFiveArticles']);

Route::get('/login', function () {
    return view('login');
});

Route::post('/submit-login-form', [\App\Http\Controllers\AdministratorController::class, 'UserLogin']);
