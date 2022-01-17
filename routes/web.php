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

Route::get('/', 'App\Http\Controllers\BooksController@show');
Route::post('/deleteBook', 'App\Http\Controllers\BooksController@deleteBook');
Route::post('/editBook', 'App\Http\Controllers\BooksController@dataForBookEdit');
Route::post('/updateBook', 'App\Http\Controllers\BooksController@updateBook');
Route::post('/addBook', 'App\Http\Controllers\BooksController@addNewBook');

Route::get('/shelves', 'App\Http\Controllers\ShelfController@show');
Route::post('/addShelf', 'App\Http\Controllers\ShelfController@addShelf');
Route::post('/deleteShelf', 'App\Http\Controllers\ShelfController@deleteShelf');

Route::get('/readers', 'App\Http\Controllers\ReadersController@show');
Route::post('/addReader', 'App\Http\Controllers\ReadersController@addReader');
Route::post('/editReader', 'App\Http\Controllers\ReadersController@editReader');
Route::post('/deleteReader', 'App\Http\Controllers\ReadersController@deleteReader');
Route::post('/loadReader', 'App\Http\Controllers\ReadersController@loadReaderForEdit');

Route::get('/journal', 'App\Http\Controllers\BooksController@readingJournal');
