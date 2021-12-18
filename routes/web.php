<?php

use App\Http\Controllers\Dashboard\CategoryResourceController;
use App\Http\Controllers\Dashboard\DashboardController;
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
})->name('home');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    // Templates
    Route::view('forms', 'dashboard.__templates.forms')->name('forms');
    Route::view('cards', 'dashboard.__templates.cards')->name('cards');
    Route::view('charts', 'dashboard.__templates.charts')->name('charts');
    Route::view('buttons', 'dashboard.__templates.buttons')->name('buttons');
    Route::view('modals', 'dashboard.__templates.modals')->name('modals');
    Route::view('tables', 'dashboard.__templates.tables')->name('tables');
    Route::view('calendar', 'dashboard.__templates.calendar')->name('calendar');
    Route::view('pagination', 'dashboard.__templates.pagination')->name('pagination');

    // Dashboard
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::resource('categories', CategoryResourceController::class)->names('categories');
    });
});
