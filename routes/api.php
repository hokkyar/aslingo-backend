<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/mantap', function (Request $request) {
  return response([
    "sip" => "mantap"
  ]);
});

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
