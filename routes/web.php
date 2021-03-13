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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

    /**
     * Login
     */


    Route::get('admin/login', 'AuthController@showLoginForm')->name('admin.login');
    Route::post('admin/login/do', 'AuthController@login')->name('admin.login.do');

Route::group(['middleware'=>['auth']], function () {
    /**
     * dashboard
     */
    Route::get('admin', 'AuthController@dashboard')->name('admin');

    Route::get('admin/logout', 'AuthController@logout')->name('admin.logout');

    /**
     * User
    */
    Route::resource('admin/users','AdminUserController');

    /**
     * AnimalController
     */
    Route::get('animal/trashed', 'AnimalController@trashed')->name('animal.trashed');
    Route::get('animal/{animal}/restore', 'AnimalController@restore')->name('animal.restore');
    Route::delete('animal/{animal}/forceDelete', 'AnimalController@forceDelete')->name('animal.forceDelete');
    Route::get('animal/{tutor}/novoAnimal', 'AnimalController@novoAnimal')->name('animal.novoAnimal');
    Route::resource('animal', 'AnimalController');


    /**
     * AnamneseController
     */
    Route::delete('anamnese/{arquivo}/delete', 'AnamneseController@deleteArquivo')->name('anamnese.arquivo.delete');
    Route::get('anamnese/{consulta}/novaconsulta', 'AnamneseController@novaconsulta')->name('anamnese.novaconsulta');
    Route::resource('anamnese', 'AnamneseController');

    /**
     * TutorController
     */
    Route::resource('tutor', 'TutorController');

    /**
     * RacasController
     */
    Route::resource('racas','RacasController');
    
    /**
     * LocalController de atendimento
     */

    Route::resource('local','LocalController');
    
     /**
     * FullcalendarController
     */
    Route::get('calendario','FullcalendarController@index')->name('calendario.index');

    Route::get('calendario/load-events', 'EventController@loadEvents')->name('routeLoadEvents');

    Route::put('calendario/event-update', 'EventController@update')->name('routeEventUpdate');

    Route::post('calendario/event-store', 'EventController@store')->name('routeEventStore');

    Route::delete('calendario/event-destroy', 'EventController@destroy')->name('routeEventDelete');


    /**
     * Rotas para Eventos Rápidos
     */
    Route::delete('calendario/fast-event-destroy', 'FastEventController@destroy')->name('routeFastEventDelete');

    Route::put('calendario/fast-event-update', 'FastEventController@update')->name('routeFastEventUpdate');

    Route::post('calendario/fast-event-store', 'FastEventController@store')->name('routeFastEventStore');


});
