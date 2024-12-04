<?php

use App\Http\Controllers\PassageiroController;

Route::get('/passageiros', [PassageiroController::class, 'index']);
Route::post('/passageiros', [PassageiroController::class, 'store']);
Route::put('/passageiros/{id}', [PassageiroController::class, 'update']);
Route::delete('/passageiros/{id}', [PassageiroController::class, 'destroy']);
