<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Video;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('post', function() {
    /// Create image for post
    $post = Post::first();
    $post->image()->create(['url' => 'img/docs.png']);
});

Route::get('user', function() {
     /// create image for user
    $user = User::first();
    $user->image()->create(['url' => 'img/profile.png']);
});

/// one to many
Route::get('post-comment', function () {
    $post = Post::first();
    $post->comments()->create(['body' => 'The Other comment on here']);

});

Route::get('video-comment', function () {
    $video = Video::first();
    $video->comments()->create(['body' => 'The Video comment']);

});


/// many to many
Route::get('tag-post', function() {
    /// Create tag for post
    $post = Post::first();
    $post->tags()->create(['name' => 'Eloquent']);
});

Route::get('tag-videos', function() {
    /// Create tag for videos
    $video = Video::first();
    $video->tags()->create(['name' => 'Javascript']);
});

// atttach existing tag
Route::get('attach-tag', function() {
    /// Create tag for videos
    $video = Video::first();
    $video->tags()->attach(1);
});
