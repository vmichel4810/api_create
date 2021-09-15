<?php

use App\Http\Controllers\ConstructorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\RaceController;
use App\Http\Resources\RaceCollection;
use App\Http\Resources\ConstructorCollection;
use App\Http\Resources\DriverCollection;
use App\Http\Resources\DriverResource;
use App\Models\Driver;
use App\Models\Race;

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
    'drivers' => DriverController::class,
    'races' => RaceController::class,
    'constructors' => ConstructorController::class,
    'results' => ResultController::class,
]);

Route::get('/drivers', function (){
    return new DriverCollection(Driver::paginate(5));
});
