<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user = $request->user();
    // Ambil semua nama permission milik user dan sisipkan ke dalam response
    $user->permissions = $user->getAllPermissions()->pluck('name');
    return $user;
});