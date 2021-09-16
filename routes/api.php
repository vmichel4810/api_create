<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// use Controller
use App\Http\Controllers\CircuitController;
use App\Http\Controllers\ConstructorController;
use App\Http\Controllers\DriverController;
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

// authentification
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::post('/register',[AuthController::class,'register']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products',[ProductController::class,'store']);
    Route::put('/products/{id}',[ProductController::class,'update']);
    Route::delete('/products/{id}',[ProductController::class,'delete']);
    Route::post('/logout',[AuthController::class,'logout']);
});


