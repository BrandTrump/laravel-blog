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
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
Route::post('/submit', 'App\Http\Controllers\PostsController@submit');

Route::get('/create', 'App\Http\Controllers\PostsController@showCreate')->middleware('verified');

/*Route::resource('post', 'App\Http\Controllers\PostsController');*/
/*Route::get('/', function () {

    return view('posts', [
        'posts' => Post::latest()->with(['category', 'author'])->get()
    ]);
});*/


Route::get('posts/{post:slug}', function (Post $post) { // Post::where('slug', $post)->firstOrFail()


    $comments = Comment::forPost($post)->get()->threaded();


    /*$comments = $post->comment->groupBy('parent_id'); // null

    $comments['root'] = $comments[''];

    unset($comments['']);*/

    return view('post', [

        $post = Post::with('category')->find($post->id)


    ], compact('comments', 'post'));

});

Route::get('billing', 'App\Http\Controllers\PaySubscriptionController@store');

Route::get('categories/{category:slug}','App\Http\Controllers\PostsController@showCategories');

Route::get('authors/{author:username}','App\Http\Controllers\PostsController@showAuthor');

Route::post('comment', 'App\Http\Controllers\CommentController@store');

Route::get('profile', 'App\Http\Controllers\UserController@profile')->name('profile');
Route::post('profile', 'App\Http\Controllers\UserController@update_avatar');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/search/','App\Http\Controllers\PostsController@search')->name('search');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth', 'verified'])->get('/two-factor-auth', function () {
    return view('two-factor-auth');
})->name('two-factor-auth');

