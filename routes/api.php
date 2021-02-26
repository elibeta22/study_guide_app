<?php

use Illuminate\Http\Request;

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



Route::namespace('Api')->group(function () {

    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'ForgotPasswordController@resetPassword');


    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

    Route::post('/email/verify', 'VerificationController@verify')->middleware('auth');
    Route::get('/email/resend', 'VerificationController@resend')->middleware('auth');

    Route::get('schools/search', 'SchoolController@search');
    Route::get('schools/{school}', 'SchoolController@show');
    Route::get('schools/{school}/departments', 'SchoolController@departments');

    Route::get('departments/search', 'DepartmentController@search');
    Route::get('departments/{department}', 'DepartmentController@show');

    Route::get('professors/search', 'ProfessorController@search');
    Route::post('professors/rate', 'ProfessorController@rate')->middleware('auth');
    Route::post('professors/upload', 'ProfessorController@upload')->middleware('auth');
    Route::post('professors/update-profile', 'ProfessorController@updatePorfile')->middleware('auth');
    Route::get('professors/{professor}/study-data', 'ProfessorController@studyData')->middleware('auth');
    Route::delete('documents/{document}', 'ProfessorController@deleteDocument')->middleware('auth');
    Route::get('professors/{professor}', 'ProfessorController@show');

    Route::get('states', 'StateController@index');
});
