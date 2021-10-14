<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BallotController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoterController;

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
    return view('homepage.homeCopy');
});
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

require __DIR__ . './kevorn.php';
require __DIR__ . './latoya.php';
require __DIR__ . './lewis.php';
require __DIR__ . './richard.php';
// Auth::routes();

// Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
