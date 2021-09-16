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
use App\Http\Resources\CircuitCollection;

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

//route URI
Route::apiResources([
    'drivers' => DriverController::class,
    'races' => RaceController::class,
    'constructors' => ConstructorController::class,
    'results' => ResultController::class,
    'circuits' => CircuitController::class,
]);

//pagination

Route::get('/drivers', function (){
    return new DriverCollection(Driver::paginate(5));
});
Route::get('/circuits', function (){
    return new CircuitCollection(Circuit::paginate(5));
});


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


