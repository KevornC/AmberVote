<?php

Route::middleware('auth')->group(function () {
    Route::get('dashboard/BallotQuestion/{id?}', [\App\Http\Controllers\BallotQuestionController::class, 'BQ'])->name('BQ');
    Route::post('dashboard/BallotQuestion/{id?}', [\App\Http\Controllers\BallotQuestionController::class, 'AddBQ'])->name('AddBQ');
    Route::get('dashboard/View/BallotQuestion', [\App\Http\Controllers\BallotQuestionController::class, 'ViewBQ'])->name('ViewBQ');
    Route::get('dashboard/Edit/BallotQuestion/{id}', [\App\Http\Controllers\BallotQuestionController::class, 'ViewUpdateBQ'])->name('ViewUpdateBQ');
    Route::post('dashboard/Update/BallotQuestion', [\App\Http\Controllers\BallotQuestionController::class, 'UpdateBQ'])->name('UpdateBQ');
    Route::get('dashboard/Delete/BallotQuestion/{id}', [\App\Http\Controllers\BallotQuestionController::class, 'DeleteBQ'])->name('DeleteBQ');


    Route::get('dashboard/View/BallotOption', [\App\Http\Controllers\BallotOptionController::class, 'ViewBO'])->name('ViewBO');
    Route::get('dashboard/Edit/BallotOption/{id}', [\App\Http\Controllers\BallotOptionController::class, 'ViewUpdateBO'])->name('ViewUpdateBO');
    Route::get('dashboard/BallotOption/{id}', [\App\Http\Controllers\BallotOptionController::class, 'BO'])->name('BO');
    Route::post('dashboard/Add/BallotOption', [\App\Http\Controllers\BallotOptionController::class, 'AddBO'])->name('AddBO');
    Route::post('dashboard/Finish/Add/BallotOption', [\App\Http\Controllers\BallotOptionController::class, 'FinishAddBO'])->name('FinishAddingOptions');
    Route::post('dashboard/Delete/BallotOption', [\App\Http\Controllers\BallotOptionController::class, 'delete'])->name('DeleteBO');
    Route::post('dashboard/Update/BallotOption', [\App\Http\Controllers\BallotOptionController::class, 'UpdateBO'])->name('UpdateBO');
});
