<?php

use App\Http\Controllers\FormController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('message', function () {
    return response()->json(['message' => 'Hello World!']);
});

// Form submission route
Route::post('/form', [FormController::class, 'store']);

Route::middleware('web')->get('/csrf-token', function() {
    return response()->json(['csrfToken' => csrf_token()]);
});

