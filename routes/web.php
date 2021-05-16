<?php

use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers;
use App\Http\Controllers\PostsController;

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


Route::get('/','App\Http\Controllers\PostsController@index');
/*Route::get('/', function () {

    return view('posts', [
        'posts' => Post::latest()->with(['category', 'author'])->get()
    ]);
});*/


Route::get('posts/{post:slug}', function (Post $post) { // Post::where('slug', $post)->firstOrFail()

    return view('post', [
        'post' => $post
    ]);

});

Route::get('categories/{category:slug}',function (Category $category) {
    return view('posts-meta', [
            'posts' => $category->posts
        ]);
});

Route::get('authors/{author:username}',function (User $author) {
    return view('posts-meta', [
        'posts' => $author->posts
    ]);
});

Route::post('comment', 'App\Http\Controllers\CommentController@store');

Route::get('profile', 'App\Http\Controllers\UserController@profile')->name('profile');
Route::post('profile', 'App\Http\Controllers\UserController@update_avatar');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/search/','App\Http\Controllers\PostsController@search')->name('search');



