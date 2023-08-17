<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('events', EventController::class);

// RSVP
Route::post('/events/{event}/rsvp', 'EventController@rsvp')->name('events.rsvp');
// Un-RSVP
Route::delete('/events/{event}/unrsvp', 'EventController@unrsvp')->name('events.unrsvp');

