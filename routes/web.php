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
Route::get('/post/{id}', function ($id) {
    $posts = \App\Entities\Post::create([
            'author_id' => 1,
            'title' => "Who are the four BLACKPINK members from Lisa to Jennie?",
            'img' => 'https://i2.wp.com/metro.co.uk/wp-content/uploads/2019/04/SEI_58822998.jpg',
            'slug' => ucwords(str_replace('-', ' ', "Who are the four BLACKPINK members from Lisa to Jennie?")),
            'content' => "Who are the four BLACKPINK members from Lisa to Jennie?",
    ]);

    dd($posts);
});
