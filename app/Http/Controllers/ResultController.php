<?php

namespace App\Http\Controllers;
// resources
use App\Http\Resources\ResultCollection;
use App\Http\Resources\ResultResource;
//models
use App\Models\Result;
//illuminate
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;

class ResultController extends Controller
{

    public function index()
    {
        return new ResultCollection(Result::paginate(15));
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

        $result = new Result();
        $result->FindOrFail($result);

        return Response($result);
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




    public function update($request, $result) {
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
