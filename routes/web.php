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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout/app');
});

Route::get('/callme', 'Callme@create');

Route::get('/callme/update/{id}', 'Callme@update');

Route::get('/calls', 'Callme@get');

Route::get('/categories', 'Categories@get');

Route::get('/quote/create', 'Quotes@create');

Route::get('/quote', 'Quotes@get');

Route::get('/subcategory', 'SubCategories@get');

Route::get('/claim', 'Claims@create');

Route::get('/plans', 'Plan@get');

Route::get('/claim_status', 'Claim_status@get');

Route::get('/claim/create/{id}', 'Claim_status@create');