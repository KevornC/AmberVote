<?php

use App\Http\Controllers\VoterController;

//Voter Section

//Adding Voters Routes

Route::get('dashboard/Add/Election/Voter', [VoterController::class, 'index'])->name('AddVoterIndex');

Route::post('dashboard/Add/Election/Voter', [VoterController::class, 'addvoter'])->name('AddVoterIndex');

//View Voters Info Routes
Route::get('dashboard/View/Election/Voters', [VoterController::class, 'view'])->name('ViewVoterIndex');

//Edit Voters Info Routes
Route::get('dashboard/Edit/Election/Voter{id}', [VoterController::class, 'edit'])->name('EditVoterIndex');

Route::post('dashboard/Edit/Election/Voter', [VoterController::class, 'update'])->name('EditVoterIndex');

//Delete Voter

Route::get('dashboard/Delete/Election/Voter{id}', [VoterController::class, 'delete'])->name('DeleteVoterIndex');
