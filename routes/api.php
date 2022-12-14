<?php

use App\Http\Controllers\Api\StudentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(StudentController::class)->group(function () {
    Route::get('/students', 'getStudents');
    Route::get('/students/{id}', 'getStudent');
    Route::post('/students', 'createStudent');
    Route::put('/students/{id}', 'updateStudent');
    Route::delete('/students/{id}', 'deleteStudent');
    Route::put('/students/{id}/status', 'changeStatus');
});
