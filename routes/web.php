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

Route::get('/',  [
    'uses' => 'App\Http\Controllers\LinkController@list',
    'as' => 'link.list'
]);


Route::get('/add', function () {
    return view('link');
})->name('link.add');

Route::get('/{short_link}', [
    'uses' => 'App\Http\Controllers\LinkController@show',
    'as' => 'link.show'
]);

Route::post('/', [
    'uses' => 'App\Http\Controllers\LinkController@create',
    'as' => 'link.create'
]);


