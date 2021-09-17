<?php

namespace App\Http\Controllers;

use App\Http\Resources\ConstructorResource;

use App\Models\Constructor;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;


class ConstructorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response(Constructor::all());
    }

    /**
    * @OA\Get(
    * path="/api/Constructors",
    * operationId="getAllConstructor",
    * description="Return all Constructor with their informations.",
    * tags={"Constructors"},
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
        $constructor = Constructor::find($id);
        if ($constructor) {
            return new ConstructorResource($constructor);
        } 
        return response()->json('Constructor not found!', 404);
    }

    /**
    * @OA\Get(
    * path="/api/constructors/{constructor}",
    * operationId="getAllConstructor",
    * description="Return constructor by ID.",
    * tags={"Constructors"},
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
        $constructor = new Constructor();
        $constructor->createConstructor($request->all());
        return response()->json($constructor, 201);
    }

    /**
    * @OA\Post(
    * path="/api/constructors/",
    * operationId="CreateConstructor",
    * description="Create new constructor.",
    * tags={"Constructors"},
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
     * @param  \App\Models\Constructor  $constructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Constructor $constructor)
    {
        $constructor->updateConstructor($request->all());

        return response()->json($constructor, 200);
    }

    /**
    * @OA\Patch(
    * path="/api/constructors/{constructor}",
    * operationId="UpdateConstructor",
    * description="Update constructor by Id.",
    * tags={"Constructors"},
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
     * @param  \App\Models\Constructor  $constructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Constructor $constructor)
    {
        $constructor->delete();
        return response()->json('', 204);
    }

    /**
    * @OA\Delete(
    * path="/api/constructors/{constructor}",
    * operationId="UpdateConstructor",
    * description="Update constructor by Id.",
    * tags={"Constructors"},
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