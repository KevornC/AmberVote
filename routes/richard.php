<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TwilioController;
use App\Http\Controllers\VoterController;

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboardHome'])->name('dashboard.home');

    Route::get('sendSMS', [TwilioController::class, 'sendSMS'])->name('sendSMS');
});
Route::get('dashboard/Election', [\App\Http\Controllers\ElectionController::class, 'ElectionIndex'])->name('Election.Index');
Route::get('dashboard/Add/Election', [\App\Http\Controllers\ElectionController::class, 'AddElection'])->name('AddElection');
Route::post('dashboard/Store/Election', [\App\Http\Controllers\ElectionController::class, 'ElectionStore'])->name('Election.Store');



Route::get('dashboard/Election', [\App\Http\Controllers\ElectionController::class, 'ElectionIndex'])->name('Election.Index');
Route::get('dashboard/Add/Election', [\App\Http\Controllers\ElectionController::class, 'AddElection'])->name('AddElection');
Route::post('dashboard/Store/Election', [\App\Http\Controllers\ElectionController::class, 'ElectionStore'])->name('Election.Store');

Route::get('dashboard/import/voters/form/{id}', [VoterController::class, 'importVotersForm'])->name('import.voters.form');
Route::post('dashboard/import/voters', [VoterController::class, 'importVoters'])->name('import.voters');


Route::get('/dashboard/election/show/{id}', [ElectionController::class, 'show'])->name('election.show');
Route::get('/dashboard/election/edit/{id}', [ElectionController::class, 'edit'])->name('election.edit');
Route::put('/election/update/{id}', [ElectionController::class, 'update'])->name('election.update');
Route::post('/election/destroy/{id}', [ElectionController::class, 'destroy'])->name('election.destroy');

// Settings routes
Route::get('/settings', [SettingController::class, 'index'])->name('setting.index');

Route::post('/voter/auth', [VoterController::class, 'voterAuth'])->name('voter.auth');
Route::get('voter/login', [VoterController::class, 'voterLogin'])->name('voter.login');
