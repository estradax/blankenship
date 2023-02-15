<?php

use App\Http\Controllers\UpdateProfileController;
use Illuminate\Support\Facades\Route;

Route::put('/update-profile', UpdateProfileController::class)
    ->middleware('auth')
    ->name('updateProfile');
