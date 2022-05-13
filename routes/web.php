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
Route::get('projet/{id}/tabledespecification', 'App\Http\Controllers\TableController@index');
Route::get('projet/{id}/banquedequestion', 'App\Http\Controllers\QcmController@indexbanque');
Route::get('projet/{id}/banquedequestion/validation', 'App\Http\Controllers\QcmController@indexvalidationbanque');
Route::get('projet/{id}/banquedequestion/{id1}/categorie/{id2}', 'App\Http\Controllers\QcmController@creationqcmview1');
Route::get('projet/{id}/banquedequestion/{id1}/categorie/{id2}/creationqcm', 'App\Http\Controllers\QcmController@creationqcmview2');
Route::get('projet/{id}/banquedequestion/{id1}/categorie/{id2}/Qcm/{id3}', 'App\Http\Controllers\QcmController@specifiedqcmview');
Route::get('projet/{id}/banquedequestion/{id1}/categorie/{id2}/Qcm/{id3}/addproposition/', 'App\Http\Controllers\QcmController@addpropositionview');
Route::get('projet/{id}/banquedequestion/{id1}/categorie/{id2}/Qcm/{id3}/editproposition/{id4}', 'App\Http\Controllers\QcmController@editpropositionview');
Route::get('/navbar/{id}', 'App\Http\Controllers\TableController@navbar');
Route::post('updatestatut/{id}/{id1}', 'App\Http\Controllers\PropositionController@updatestatut')->name('updatestatut');
Route::post('updateproposition/{id}/{id1}/{id2}/{id3}/{id4}/', 'App\Http\Controllers\PropositionController@updateproposition')->name('updateproposition');
Route::post('validation/{id}', 'App\Http\Controllers\QcmController@validation')->name('validation');


route::post('/create',[\App\Http\Controllers\QcmController::class,'store']);
route::post('/upload',[\App\Http\Controllers\QcmController::class,'uploadimage'])->name('qcm.upload');


Route::get('/', function(){ return view('welcome');});

Route::get('/questionnaire/{id}', 'App\Http\Controllers\QuestionnaireController@create');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();
Route::resource('chapitre',App\Http\Controllers\ChapitreController::class);
Route::resource('section',App\Http\Controllers\SectionController::class);
Route::resource('point',App\Http\Controllers\PointController::class);
Route::resource('performanceprojet',App\Http\Controllers\PerformanceProjetController::class);
Route::resource('performancepoint',App\Http\Controllers\PerformancePointController::class);
Route::resource('questionnaire',App\Http\Controllers\QuestionnaireController::class);
Route::resource('qcm',App\Http\Controllers\QcmController::class);
Route::resource('proposition',App\Http\Controllers\PropositionController::class);