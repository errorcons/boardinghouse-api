<?php

use App\Http\Controllers\TenantController;
use App\Http\Controllers\TipController;


Route::get('/daily-tip', [TipController::class, 'getDailyTip']);
Route::apiResource('tenants', TenantController::class);

