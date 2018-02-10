<?php

use Illuminate\Http\Request;
Use App\Recipe;
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

Route::get('recipes/{filter?}', 'API\RecipesController@index')->name('recipes');
Route::get('recipe/{id}', 'API\RecipesController@recipe')->name('recipe');
Route::post('recipe/add', 'API\RecipesController@add')->name('add_recipe');
Route::patch('recipe/edit/{id}', 'API\RecipesController@edit')->name('edit_recipe');
Route::post('rating/add/{id}', 'API\RatingsController@add')->name('add_rating');