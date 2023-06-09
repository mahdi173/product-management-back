<?php

use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;

Route::get('types', [TypeController::class, 'index'])->name('types.index');