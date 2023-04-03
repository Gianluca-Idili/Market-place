<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;
use GuzzleHttp\Middleware;

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
//PublicController
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/categories/{category}', [PublicController::class, 'categoryShow'])->name('category.show');
Route::get('/ricerca/annuncio', [PublicController::class, 'searchArticles'])->name('articles.search');
Route::get('/contact_us',[PublicController::class,'contact_us'])->name('contact_us');
Route::post('/contact_us/submit',[PublicController::class,'contact_us_submit'])->name('contact_us_submit');


// Rotte ricerca
Route::get('/ricerca/article', [PublicController::class, 'searchArticle'])->name('articles.search');

//ArticleController
Route::get('/article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::get('/article/show/{article}', [ArticleController::class, 'show'])->name('article.show');

Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
Route::put('/article/update/{article}', [ArticleController::class, 'update'])->name('article.update');
Route::delete('/article/destroy/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');


//UserController
Route::get('/user/profile', [UserController::class, 'profile'])->middleware('auth')->name('user.profile');
Route::delete('/user/destroy', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
Route::put('/user/avatar/{user}', [UserController::class, 'avatar'])->name('avatar');
Route::get('/user/profile/preferiti', [ArticleController::class, 'preferiti'])->middleware('auth')->name('article.profilePreferiti');


//RevisorController
Route::get('/revisor/index', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accetta/annuncio/{article}', [RevisorController::class, 'acceptArticle'])->middleware('isRevisor')->name('revisor.accept_article');
Route::patch('/rifiuta/annuncio/{article}', [RevisorController::class, 'rejectArticle'])->middleware('isRevisor')->name('revisor.reject_article');
Route::get('/richiesta/revisore',[RevisorController::class, 'becomeRevisor'])->name('become.revisor');
Route::get('/rendi/revisore/{user}',[RevisorController::class, 'makeRevisor'])->name('make.revisor');
Route::get('/form/revisore',[RevisorController::class, 'formRevisor'])->middleware('auth')->name('revisor.form');
 
// lingue
Route::post('/lingua/{lang}',[PublicController::class, 'setLanguage'])->name('set_language_locale');

// TEST
Route::post('/revisore/update',[RevisorController::class, 'update'])->name('revisor.update');

//FavouritController
Route::post('/articles/addFavorite', 'App\Http\Controllers\ArticleController@addFavorite')->name('articles.addFavorite');
Route::delete('/articles/destroyFavorite', [ArticleController::class, 'destroyFavorite'])->name('articles.removeFavorite');
