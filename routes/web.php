<?php

use Illuminate\Support\Facades\Route;
use App\Models\Contact;
use Illuminate\Http\Request;

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

Route::get('/',['uses' => '\App\Http\Controllers\IndexController@index','as' => 'adminIndex']);

Route::any('/main/search','\App\Http\Controllers\SiteController@search');

Route::resource('/main','\App\Http\Controllers\SiteController');



