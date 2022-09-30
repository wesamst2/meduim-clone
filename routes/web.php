<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::post('ckeditor/imageupload', [ArticleController::class, 'upload_ckeditor'])->name('ckeditorupload');

Route::get('/articles/manage', [ArticleController::class, 'index'])->middleware('auth');
Route::resource('articles', ArticleController::class)->except([
    'index','show'
])->middleware('auth');
Route::resource('articles', ArticleController::class)->only([
    'show'
])->scoped([
    'article' => 'slug',
]);

require __DIR__.'/auth.php';
