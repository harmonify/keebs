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

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    // Templates
    Route::view('dashboard.__templates.forms', 'forms')->name('forms');
    Route::view('dashboard.__templates.cards', 'cards')->name('cards');
    Route::view('dashboard.__templates.charts', 'charts')->name('charts');
    Route::view('dashboard.__templates.buttons', 'buttons')->name('buttons');
    Route::view('dashboard.__templates.modals', 'modals')->name('modals');
    Route::view('dashboard.__templates.tables', 'tables')->name('tables');
    Route::view('dashboard.__templates.calendar', 'calendar')->name('calendar');
    Route::view('dashboard.__templates.pagination', 'pagination')->name('pagination');

    Route::prefix('dashboard')->name('dashboard.')->group(function () {

        Route::get('/', function () {
            return view('dashboard.index');
        })->name('index');
    });
});
