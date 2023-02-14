<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UpdateProfileController;

Route::put('/update-profile', UpdateProfileController::class)
    ->middleware('auth')
    ->name('profile.update');
