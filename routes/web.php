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

Route::get('/', 'SiteController@index')->name('site');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::group(['middleware' => 'admin'], function () {
            Route::get('/', function () {
                return view('admin.layouts.home');
            })->name('admin');
            Route::resource('leagues', 'Admin\LeagueController')->parameters([
                'leagues' => 'league'
            ]);
            Route::resource('teams', 'Admin\TeamController')->parameters([
                'teams' => 'team'
            ]);
        });
    });
});