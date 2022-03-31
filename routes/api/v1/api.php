<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\v1\SimpleTestController;
use \App\Http\Controllers\Api\v1\MultiAnswerTestController;
use \App\Http\Controllers\Api\v1\ComparisonTestController;
use \App\Http\Controllers\Api\v1\OpenTestController;
use \App\Http\Controllers\Api\v1\SubjectsController;

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

Route::apiResources([
    'simple_test' => SimpleTestController::class,
    'multi_answer_test' => MultiAnswerTestController::class,
    'open_test' => OpenTestController::class,
    'comporison_test' => ComparisonTestController::class,
    'subjects' => SubjectsController::class
]);
