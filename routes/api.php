<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;

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

Route::middleware('auth:sanctum')->resource('members', MemberController::class);

Route::middleware('auth:sanctum')->get('/members/fullid/{id}', [MemberController::class, 'fullid']);
Route::get('/members/heardfrom/{id}', [MemberController::class, 'heardFrom']);
Route::middleware('auth:sanctum')->get('/members/search/{name}', [MemberController::class, 'search']);

Route::put('/members/fullid/{id}', [MemberController::class, 'updateFullid']);
Route::put('/members/heardfrom/{id}', [MemberController::class, 'newHeardFrom']);
Route::put('/members/heardfromfulldiscord/{id}', [MemberController::class, 'newHeardFromFullDiscordId']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
