<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\UserController;

// use Controller
use App\Http\Controllers\CircuitController;
use App\Http\Controllers\ConstructorController;

use App\Http\Controllers\RaceController;
use App\Http\Controllers\ResultController;


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

//route URI
Route::apiResources([
    'circuits' => CircuitController::class,
    'constructors' => ConstructorController::class,
    'drivers' => DriverController::class,
    'races' => RaceController::class,
    'results' => ResultController::class,
]);

Route::post('/register',[AuthController::class,'register']);

Route::get("search/{surname}", [CircuitController::class, 'search']);

Route::post("login",[UserController::class,'index']);

// Route::post("save-circuit",[CircuitController::class, 'validateData']);
// Route::post("save-constructor",[ConstructorController::class, 'validateData']);
Route::post("filter",[CircuitController::class, 'filterData']);
