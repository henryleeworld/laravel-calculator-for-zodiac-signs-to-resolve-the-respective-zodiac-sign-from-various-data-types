<?php

use App\Http\Controllers\ZodiacSignController;
use Illuminate\Support\Facades\Route;

Route::get('zodiac-sign/calculate/', [ZodiacSignController::class, 'calculate']);
