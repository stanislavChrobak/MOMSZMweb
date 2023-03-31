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

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/gallery', function () {
    return view('gallery');
});

Route::get('/logged-out', function () {
    return view('/GUI/loggedOut');
});

Route::get('/get-articles-of-page/{id}', [App\Http\Controllers\ArticleController::class, 'GetArticlesOfPage'])->name('get-articles-of-page');
Route::get('/view-article/{id}', [App\Http\Controllers\ArticleController::class, 'ViewArticle'])->name('view-article');

Route::get('/add-article', [\App\Http\Controllers\ArticleController::class, 'AddArticle']);
Route::post('/submit-add-article', [\App\Http\Controllers\ArticleController::class, 'SubmitAddArticle']);

Route::get('/edit-article/{id}', [App\Http\Controllers\ArticleController::class, 'EditArticle'])->name('edit-article');
Route::put('/submit-edit-article/{id}/{imgPath}', [\App\Http\Controllers\ArticleController::class, 'SubmitEditArticle'])->name('submit-edit-article');

Route::delete('/delete-article/{id}', [App\Http\Controllers\ArticleController::class, 'DeleteArticle'])->name('delete-article');

Route::get('/add-gallery', [\App\Http\Controllers\GalleryController::class, 'AddGallery']);
Route::post('/submit-add-gallery', [\App\Http\Controllers\GalleryController::class, 'SubmitAddGallery']);
Route::get('/edit-gallery/{id}', [App\Http\Controllers\GalleryController::class, 'EditGallery'])->name('edit-gallery');
Route::put('/submit-edit-gallery/{id}/{imgPath}', [\App\Http\Controllers\GalleryController::class, 'SubmitEditGallery'])->name('submit-edit-gallery');

Route::delete('/delete-gallery/{id}', [App\Http\Controllers\GalleryController::class, 'DeleteGallery'])->name('delete-gallery');



Route::post('/submit-login-form', [\App\Http\Controllers\AdministratorController::class, 'UserLogin']);
Route::get('/logout', [\App\Http\Controllers\AdministratorController::class, 'UserLogout']);
Route::get('/GUI-index/{id}', [\App\Http\Controllers\GUIController::class, 'GetIndex'])->name('GUI-index');
