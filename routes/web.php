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



Route::get('/country', 'CountryController@index')->name('country');
Route::get("/country/create","CountryController@create")->name('create-country');
Route::post("/country/create","CountryController@postCreate")->name('post-country');
Route::get("/country/delete/{id}","CountryController@delete")->name('delete-country');
Route::get("/country/edit/{id}","CountryController@edit")->name('edit-country');
Route::post("/country/edit/{id}","CountryController@postEdit")->name('post-edit-country');

Route::resource('cities', 'CityController');
Route::get("/cities/{id}/delete","CityController@destroy")->name('delete-city');

Route::resource('categories', 'CategoryController');
Route::get("/categories/{id}/delete","CategoryController@destroy")->name('delete-category');


// Route::get("/news/search","NewsController@search")->name('search-news');

//Route::get("/news/paging","NewsController@paging")->name('paging-news');
Route::resource('news', 'NewsController');
Route::get("/news/{id}/delete","NewsController@destroy")->name('delete-news');


