<?php

namespace App\Http\Controllers;
//resources
use App\Http\Resources\ConstructorResource;
use App\Http\Resources\ConstructorCollection;
use Validator;
//models
use App\Models\Constructor;
//illuminate
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $constructor = DB::table('constructor')->where('name', 100)->get();
        $constructor->query('name', 'nationality');
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


    public function show($id)
    {
        $constructor = Constructor::find($id);
        if($constructor) {
            return new ConstructorResource($constructor);
        }

        return response()->json('driver at not found', 404);

        $constructor = new Constructor();
        $constructor->FindOrFail($constructor);

        return Response($constructor);
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



    function search($constructorRef) {

        return Constructor::where("constructorRef", 'like', '%' . $constructorRef . '%')->get();

    }



    public function update(Request $request,constructor $constructor)
    {
        $constructor->updateConstructor($request->all());

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
    function filter($query, Constructor $filters)
    {
        if ($constructorId = $filters->get('constructorId')) {
            return $query->where('constructorId', 'like', "{$constructorId}%");
        }

        if ($constructorRef = $filters->get('constructorRef')) {
           return $query->whereIn('constructorRef', $constructorRef);
        }
}
