<?php

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

Route::get('/', function(){
    return response()->json([
        '/quizzes/',
    ], 200);
});

//************************************************************* Quizzes
Route::get('/quizzes/', 'QuizzesController@getQuizzes'); # get home

Route::get('/quizzes/{id}/', 'QuizzesController@getQuiz'); # get one
Route::post('/quizzes/{id}/', 'QuizzesController@postQuiz'); # send all responses at once

// Route::get('/quizzes/{id}/likes/'); # get all likes for a quizz
// Route::post('/quizzes/{id}/likes/'); # like a quizz
// Route::delete('/quizzes/{id}/likes/'); # unlike a quizz

// Route::get('/quizzes/{id}/comments/'); # get comments
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
// Route::get('/users/{id}/');
