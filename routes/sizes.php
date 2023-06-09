<?php

use App\Http\Controllers\SizeController;
use Illuminate\Support\Facades\Route;

Route::get('sizes', [SizeController::class, 'index'])->name('sizes.index');