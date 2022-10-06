<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;

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
    return redirect()->route('property.list');
});

Route::controller(PropertyController::class)->group(function () {

Route::group(['prefix' => 'property'], function () {

	Route::get('/list', 'listPoperty')->name('property.list');
		Route::get('/delete/{uuid}', 'deleteProperty')->name('property.delete');
		Route::get('/edit/{uuid}', 'editProperty')->name('property.edit');
		Route::post('/update/{uuid}','updateProperty')->name('property.update');
		Route::get('/create', 'createProperty')->name('property.create');
		Route::post('/save', 'saveProperty')->name('property.save');

	});
});

