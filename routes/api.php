<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/** Comments **/
Route::group([
    'prefix' => 'comments',
    'as' => 'comments'
], function () {
    Route::post('/', 'CommentsController@store'); // Store
    Route::get('get-comments/{id}', "CommentsController@getCommentsById")->name(".get-comments");
});

/** Posts **/
Route::group([
    'prefix' => 'posts',
    'as' => 'posts'
], function () {
    Route::get('get-related-posts/{id}', 'PostsController@getRelatedPosts')->name(".popular-posts");
    Route::get('get-popular-posts', 'PostsController@getPopularPosts')->name(".popular-posts");
});
Route::apiResource("posts", "PostsController");
