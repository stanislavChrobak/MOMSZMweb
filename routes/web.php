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

/*
Route::get('/first', function () {
    return view('first');
});

Route::get('/second', [\App\Http\Controllers\SimpleController::class, 'view']);

Route::get('/third', [\App\Http\Controllers\SimpleController::class, 'viewData']);
*/