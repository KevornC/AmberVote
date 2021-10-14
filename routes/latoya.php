<?php

use App\Http\Controllers\BallotController;
use App\Http\Controllers\BallotMsgController;
use App\Http\Controllers\QuestionAnswerController;
use App\Http\Controllers\ResultsController;


Route::middleware('auth')->group(function () {

    //***********************Ballot Controller******************************** */

    Route::get('/dashboard/ballot/{id}', [BallotController::class, 'index'])->name('ballots');

    Route::get('/dashboard/ballotType{id}', [BallotController::class, 'create'])->name('ballotsType');

    Route::get('/dashboard/ballotType/{id}', [BallotController::class, 'store'])->name('storeBallot');

    //*********Ballot Message******************************** */

    Route::get('/dashboard/ballotmsgs', [BallotMsgController::class, 'index'])->name('ballot.msgs');

    Route::post('/dashboard/ballotmsgs', [BallotMsgController::class, 'store'])->name('ballotmsgs.store');


    Route::get('election/{id}', [QuestionAnswerController::class, 'index'])->name('election.index');

    // Route::post('/election/{id}', [QuestionAnswerController::class, 'login'])->name('election.store');

    // *****************RESULTS***************************/

    Route::get('dashboard/results/{id}', [ResultsController::class, 'create'])->name('results.index');
});

// **********Ballot View for Voter********
Route::get('election/{id}/ballot', [QuestionAnswerController::class, 'create'])->name('election.answer');

Route::post('election/answers', [QuestionAnswerController::class, 'store'])->name('election.storeanswer');
