<?php

use App\Http\Controllers\Profile\UpdateProfileController;
use Illuminate\Support\Facades\Route;

Route::put('/profile/update', UpdateProfileController::class)
    ->middleware('auth')
    ->name('profile.update');
