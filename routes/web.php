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

Route::get('/home', 'App\Http\Controllers\ProjetController@projectview');
Route::post('/home', 'App\Http\Controllers\PerformanceProjetController@prepare')->name('prepare');
Route::get('/projet/{id}', 'App\Http\Controllers\ChapitreController@chapitreview');
Route::get('/projet/performance/{id}', 'App\Http\Controllers\PerformanceController@performanceview');
Route::post('/projet/performance/{id}', 'App\Http\Controllers\PerformanceProjetController@performanceProjetViewPost');
Route::post('/projet/{id}', 'App\Http\Controllers\ChapitreController@chapitreviewPost');
Route::get('/projet/{id}/chapitre/{id1}', 'App\Http\Controllers\SectionController@sectionview');
Route::post('/projet/{id}/chapitre/{id1}', 'App\Http\Controllers\SectionController@sectionviewPost');
Route::get('/projet/{id}/chapitre/{id1}/section/{id2}', 'App\Http\Controllers\PointController@pointview');
Route::post('/projet/{id}/chapitre/{id1}/section/{id2}', 'App\Http\Controllers\PointController@pointviewPost');

Route::get('/tabledespecification/{id}', 'App\Http\Controllers\TableController@index');
Route::get('/navbar/{id}', 'App\Http\Controllers\TableController@navbar');

Route::get('/', function(){ return view('welcome');});



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();
Route::resource('chapitre',App\Http\Controllers\ChapitreController::class);
Route::resource('section',App\Http\Controllers\SectionController::class);
Route::resource('point',App\Http\Controllers\PointController::class);
Route::resource('performanceprojet',App\Http\Controllers\PerformanceProjetController::class);
Route::resource('performancepoint',App\Http\Controllers\PerformancePointController::class);


