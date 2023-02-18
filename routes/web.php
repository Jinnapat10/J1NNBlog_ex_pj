<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;

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

// Route::get('/', function () {
//     return view('frontend.pages.example');
// });

Route::view('/', 'frontend.pages.home')->name('home');

Route::get('/page', [BlogController::class, 'pagePosts'])->name('page_posts');
Route::get('/search', [BlogController::class, 'searchBlog'])->name('search_posts');
Route::get('/about-me', [BlogController::class, 'AboutMe'])->name('about_me');
Route::get('/article/{any}', [BlogController::class, 'readPost'])->name('read_post');
Route::get('/posts/tags/{any}', [BlogController::class, 'tagPosts'])->name('tag_posts');


Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'contactPage')->name('contact_page');
    Route::post('/contact', 'sendMessage')->name('send_message');
});