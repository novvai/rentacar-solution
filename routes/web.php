<?php

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

Auth::routes();

// Route::get('/', 'HomeController@index')->name('home');
// Adminstration Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'namespace' => 'Admin'], function () {
    // Dashboard
    Route::get('/', 'DashboardController@index')->name('admin.dashboard');

    // Cars
    Route::resource('/cars', 'CarsController', [
        'as'     => 'admin',
        'except' => ['show'],
    ]);
    // Car Brands
    Route::resource('/brands', 'BrandsController', [
        'as'     => 'admin',
        'except' => ['create', 'edit'],
    ]);
    // Car Brand Models API
    Route::post('/api/brand/models', 'API\CarBrandsController@getModels');
    // Car Brand Models
    Route::post('/brands/{brand}/models', 'BrandModelsController@store')
        ->name('admin.brand.models.store');
    Route::patch('/brands/{brand}/models/{model}', 'BrandModelsController@update')
        ->name('admin.brand.models.update');
    Route::delete('/brands/{brand}/models/{model}', 'BrandModelsController@destroy')
        ->name('admin.brand.models.destroy');

    // Car Colors
    Route::resource(
        '/colors',
        'ColorsController',
        ['as' => 'admin', 'only' => ['index', 'store', 'update', 'destroy']]
    );
    // Reservations
    Route::get('/reservations', 'ReservationsController@index')->name('admin.reservations.index');
    Route::get('/reservations/query', 'ReservationsController@search')->name('admin.reservations.search');

});

// Client Routes
Route::group(['namespace' => 'Clientside'], function () {
    Route::get('/', 'HomeController@index');
    Route::post('/reservation', 'ReservationsController@store');
    Route::post('api/calculate/reservation', 'API\ReservationController@calculateReservation');
});
