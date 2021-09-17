<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResultResource;

use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Response(Result::all());
    }

    /**
    * @OA\Get(
    * path="/api/results",
    * operationId="getAllresult",
    * description="Return all result with their informations.",
    * tags={"Results"},
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
        $result = Result::find($id);
        if ($result) {
            return new ResultResource($result);
        } 
        return response()->json('Result not found!', 404);
    }

    /**
    * @OA\Get(
    * path="/api/results/{result}",
    * operationId="getAllresult",
    * description="Return result by ID.",
    * tags={"Results"},
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
        $result = new Result();
        $result->createResult($request->all());
        return response()->json($result, 201);
    }

 /**
    * @OA\Post(
    * path="/api/results/",
    * operationId="Createresult",
    * description="Create new result.",
    * tags={"Results"},
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
     * @param  \App\Models\results  $results
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Result $result) 
    {
        $result->updateResult($result->all());

        return response()->json($result, 200);
    }

    /**
    * @OA\Patch(
    * path="/api/results/{result}",
    * operationId="UpdateResult",
    * description="Update result by Id.",
    * tags={"Results"},
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
     * @param  \App\Models\results  $results
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result) {
        $result->delete();
        return response()->json('Result deleted', 204);
    }

    /**
    * @OA\Delete(
    * path="/api/results/{result}",
    * operationId="UpdateResult",
    * description="Update result by Id.",
    * tags={"Results"},
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
