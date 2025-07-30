<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Contoh route API minimal
Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});
