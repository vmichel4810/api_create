<?php

namespace App\Http\Controllers;

//resources

use App\Http\Controllers\DriverController as ControllersDriverController;
use App\Http\Resources\DriverResource;
use App\Http\Resources\DriverCollection;
//models
use App\Models\Driver;
use App\Product;
//illuminate
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\DB;



class DriverController extends Controller
{
    public function sorted(Request $request) {
        $query = Driver::query();

        $sort = $request->input('sort');
        $query->sortBy('surname', $sort);
        return $query->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ControllersDriverController(Driver::paginate(15));
    }

    /**
    * @OA\Get(
    * path="/api/drivers",
    * operationId="getAllDriver",
    * description="Return all driver with their informations.",
    * tags={"Drivers"},
    *
    * @OA\Response(
    * response=200,
    * description="Opération réussi",
    * ),
    *
    * @OA\Response(
    * response=401,
    * description="Non authentifié",
    * ),
    * 
    * @OA\Response(
    * response=403,
    * description="Interdit"
    * ),
    *
    * @OA\Response(
    * response=400,
    * description="Mauvaise requête"
    * ),
    *
    * @OA\Response(
    * response=404,
    * description="Non trouvé"
    * ),
    * )
    */


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $driver = Driver::find($id);
        if ($driver) {
            return new DriverResource($driver);
        } 
        return response()->json('Driver not found', 404);
    }
    /**
    * @OA\Get(
    * path="/api/drivers/{dr    iver}",
    * operationId="getAllDriver",
    * description="Return driver by ID.",
    * tags={"Drivers"},
    *  @OA\Parameter(
    *      name="driver",
    *      description="enter ID",    
    *      ref="driver",
    *      in="path",
    *      required=true,
    *      @OA\Schema(
    *           type="integer"
    *      )
    * ),
    * @OA\Response(
    * response=200,
    * description="Opération réussi",
    * ),
    *
    * @OA\Response(
    * response=401,
    * description="Non authentifié",
    * ),
    * 
    * @OA\Response(
    * response=403,
    * description="Interdit"
    * ),
    *
    * @OA\Response(
    * response=400,
    * description="Mauvaise requête"
    * ),
    *
    * @OA\Response(
    * response=404,
    * description="Non trouvé"
    * ),
    * )
    */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $driver = new Driver();
        $driver->createDriver($request->all());
        return response()->json($driver, 201);
    }

    public function update(Request $request, Driver $driver) {
        $driver->updateDriver($request->all());

        return response()->json($driver, 200);
    }


    /**
    * @OA\Post(
    * path="/api/drivers/",
    * operationId="CreateDriver",
    * description="Create new driver.",
    * tags={"Drivers"},
    *
    * @OA\Response(
    * response=200,
    * description="Opération réussi",
    * ),
    *
    * @OA\Response(
    * response=401,
    * description="Non authentifié",
    * ),
    * 
    * @OA\Response(
    * response=403,
    * description="Interdit"
    * ),
    *
    * @OA\Response(
    * response=400,
    * description="Mauvaise requête"
    * ),
    *
    * @OA\Response(
    * response=404,
    * description="Non trouvé"
    * ),
    * )
    */


    /**
    * @OA\Patch(
    * path="/api/drivers/{driver}",
    * operationId="UpdateDriver",
    * description="Update driver by Id.",
    * tags={"Drivers"},
    *
    * @OA\Response(
    * response=200,
    * description="Opération réussi",
    * ),
    *
    * @OA\Response(
    * response=401,
    * description="Non authentifié",
    * ),
    * 
    * @OA\Response(
    * response=403,
    * description="Interdit"
    * ),
    *
    * @OA\Response(
    * response=400,
    * description="Mauvaise requête"
    * ),
    *
    * @OA\Response(
    * response=404,
    * description="Non trouvé"
    * ),
    * )
    */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return response()->json('Driver deleted', 204);
    }

    /**
    * @OA\Delete(
    * path="/api/drivers/{driver}",
    * operationId="UpdateDriver",
    * description="Update driver by Id.",
    * tags={"Drivers"},
    *
    * @OA\Response(
    * response=200,
    * description="Opération réussi",
    * ),
    *
    * @OA\Response(
    * response=401,
    * description="Non authentifié",
    * ),
    * 
    * @OA\Response(
    * response=403,
    * description="Interdit"
    * ),
    *
    * @OA\Response(
    * response=400,
    * description="Mauvaise requête"
    * ),
    *
    * @OA\Response(
    * response=404,
    * description="Non trouvé"
    * ),
    * )
    */
}