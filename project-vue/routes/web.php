<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\EducationalProgramController;

Route::get('/', [EducationalProgramController::class, 'index']);
