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

Route::get('/login-gui', function () {
    return view('login');
});

Route::get('/contact', function () {
    return view('contact');
});


Route::get('/gallery', [\App\Http\Controllers\GalleryController::class, 'GetLastFiveGalleries']);

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
Route::put('/submit-edit-gallery/{id}', [\App\Http\Controllers\GalleryController::class, 'SubmitEditGallery'])->name('submit-edit-gallery');

Route::delete('/delete-gallery/{id}', [App\Http\Controllers\GalleryController::class, 'DeleteGallery'])->name('delete-gallery');
Route::get('/get-galleries-of-page/{id}', [App\Http\Controllers\GalleryController::class, 'GetGalleriesOfPage'])->name('get-galleries-of-page');

Route::get('/add-action', [\App\Http\Controllers\PrepareActionsController::class, 'AddPreparedAction']);
Route::post('/submit-add-action', [\App\Http\Controllers\PrepareActionsController::class, 'SubmitAddPrepareAction']);

Route::get('/view-action/{id}', [App\Http\Controllers\PrepareActionsController::class, 'ViewAction'])->name('view-action');

Route::delete('/accept-cookie', [App\Http\Controllers\AdministratorController::class, 'AcceptCookie'])->name('accept-cookie');

Route::post('/submit-login-form', [\App\Http\Controllers\AdministratorController::class, 'UserLogin']);
Route::get('/logout', [\App\Http\Controllers\AdministratorController::class, 'UserLogout']);
Route::get('/GUI-index/{id}', [\App\Http\Controllers\GUIController::class, 'GetIndex'])->name('GUI-index');
