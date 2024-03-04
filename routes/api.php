<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\EventRestController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route :: get('/v1/events', [EventRestController::class, 'index']);
Route :: get('/v1/events/{id}', [EventRestController::class, 'show']);
