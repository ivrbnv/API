<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResultController;

Route::post('/save-to-db', [ResultController::class, 'save']);