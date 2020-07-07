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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::resource('users','UserController');
Route::resource('cities','CityController');
Route::resource('states','StateController');
Route::resource('guests','GuestController');
Route::resource('landlords','LandlordController');


Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('admin')->group(function () {
    Route::get('/logs', 'AdminController@logs')->name('logs');
});

Route::middleware('inspector')->group(function () {
    Route::get('/inspector/debt', 'InspectorController@debt')->name('inspectorDebt');
    Route::get('/statistic', 'InspectorController@statistic')->name('statistic');
});


Route::middleware('informant')->group(function () {
    Route::get('/renting', 'InformantController@renting')->name('renting');
    Route::post('/renting/destroy/{rent}', 'InformantController@destroy');
    Route::get('/debt', 'InformantController@showDebt')->name('showDebt');
    Route::post('/debt', 'InformantController@debt')->name('debt');
    Route::post('/payoff/{debt}', 'InformantController@payoff')->name('payoff');
    Route::get('/generate-pdf/{id}','PDFController@generatePDF');
});

Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

