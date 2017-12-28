<?php

use App\Library\Api\Handler AS ApiHandler;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');

Route::get('/', function(){

    $api = new ApiHandler('V1');

    $api->addLink('quizzes', route('get_quizzes'));
    $api->addLink('tags', route('get_tags'));

    return $api->send();
});

//************************************************************* Quizzes
Route::get('/quizzes', [
    'as' => 'get_quizzes',
    'uses' => 'QuizzesController@last'
]); # get home

Route::get('/quizzes/{id}', [
    'as' => 'get_quiz',
    'uses' => 'QuizzesController@one'
]); # get one

# get comments
// Route::get('/quizzes/{id}/likes/'); # get all likes for a quizz
// Route::post('/quizzes/{id}/likes/'); # like a quizz
// Route::delete('/quizzes/{id}/likes/'); # unlike a quizz

Route::get('/quizzes/{id}/comments', [
    'as' => 'get_quiz_comments',
    'uses' => 'CommentsController@getQuizComments'
]); # get comments
// Route::post('/quizzes/{id}/comments/'); # post one comments
// Route::delete('/quizzes/{id}/comments/{id}/'); # delete one comment


// //************************************************************** ME
// Route::post('/me/'); # login
// Route::delete('/me/'); # logout

// Route::get('/me/profile/'); # get my profil
// Route::post('/me/profile/'); # update my profil

// Route::post('/me/password/'); # request a password change
// Route::put('/me/password/'); # change password

// Route::post('/me/validate/'); # request a validation email
// Route::put('/me/validate/'); # validate an account

// Route::get('/me/history/'); # get quizzes history
// Route::get('/me/likes/'); # get quizzes I like

// Route::post('/me/disable/'); # disable account


// //*************************************************************** USER

// Route::get('/users/');
Route::get('/users/{id}', [
    'as' => 'get_user',
    'uses' => 'UsersController@one'
]); # get one


// //*************************************************************** TAGS

// Route::get('/users/');
// Route::get('/users/');
Route::get('/tags', [
    'as' => 'get_tags',
    'uses' => 'TagsController@last'
]); # get one
Route::get('/tags/{name}', [
    'as' => 'get_tag',
    'uses' => 'TagsController@one'
]); # get one
