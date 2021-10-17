<?php

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

Route::resource('/','Front\IndexController');

Route::resource('type.posts','Front\TypePostController');
Route::get('tag/{tag}','Front\TagController@show')->name('tag');
Route::get('category/{category}','Front\CategoryController@show')->name('category');
Route::get('posts','Front\PostController@index')->name('posts');
Route::post('newsLetter','Front\NewsLetterController@newsLetter')->name('newsLetter');
Auth::routes();
// Admin Part
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        // Amin routes
        Route::resource('admin', 'Admin\AdminController');
        Route::resource('roles', 'Admin\RoleController');
        Route::resource('categories', 'Admin\CategoryController');
        Route::resource('tags', 'Admin\TagController');
        Route::resource('types', 'Admin\PostTypeController');
        Route::resource('posts', 'Admin\PostController');
        Route::resource('users', 'Admin\UserController');
        Route::resource('settings', 'Admin\SettingController');

    });
    // Default
    Route::get('/home', 'HomeController@index')->name('home');
});



