<?php

use App\Http\Controllers\Api\{
    hashController
};
use Illuminate\Support\Facades\Route;


Route::apiResource('hash', hashController::class );


Route::post('/gethash', [hashController::class, 'getHash']);


Route::get('/', function () {
    return response()->json(['message' => 'sucess']);
});
