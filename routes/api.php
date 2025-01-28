<?php
use App\Http\Controllers\CVController;

Route::get('/cv', [CVController::class, 'getCV']);
Route::post('/cv', [CVController::class, 'updateCV']);