<?php

namespace App\Http\Controllers;
//resources
use App\Http\Resources\RaceCollection;
use App\Http\Resources\RaceResource;
//models
use App\Models\Race;
//Illuminate
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new RaceCollection(Race::paginate(15));
    }

    /**
    * @OA\Get(
    * path="/api/races",
    * operationId="getAllRace",
    * description="Return all Race with their informations.",
    * tags={"Races"},
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
     * @param  \App\Models\races  $races
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $race = Race::find($id);
        if($race) {
            return new RaceResource($race);
        }
        return response()->json('race at not found', 404);
    }

    /**
    * @OA\Get(
    * path="/api/races/{race}",
    * operationId="getAllrace",
    * description="Return race by ID.",
    * tags={"Races"},
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $race = new Race();
        $race->createRace($request->all());
        return response()->json($race, 201);
    }

    /**
    * @OA\Post(
    * path="/api/races/",
    * operationId="CreateRace",
    * description="Create new Race.",
    * tags={"Races"},
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\races  $races
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Race $race) {
        $race->updateRace($request->all());

        return response()->json($race, 201);
    }

    /**
    * @OA\Patch(
    * path="/api/races/{race}",
    * operationId="Updaterace",
    * description="Update race by Id.",
    * tags={"Races"},
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
     * @param  \App\Models\races  $races
     * @return \Illuminate\Http\Response
     */

    public function destroy(Race $race) {
        $race->delete();
        return response()->json('Race deleted', 204);
    }

    /**
    * @OA\Delete(
    * path="/api/races/{race}",
    * operationId="Updaterace",
    * description="Update race by Id.",
    * tags={"Races"},
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
