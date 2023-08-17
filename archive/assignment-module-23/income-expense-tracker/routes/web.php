<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/income/create', 'IncomeController@create');
Route::post('/income', 'IncomeController@store');

Route::get('/expense/create', 'ExpenseController@create');
Route::post('/expense', 'ExpenseController@store');

Route::get('/income', 'IncomeController@index')->name('income.list');
    Route::get('/expense', 'ExpenseController@index')->name('expense.list');