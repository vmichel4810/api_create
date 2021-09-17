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

    public function index()
    {
        return Response(Constructor::all());
        $constructor = DB::table('constructor')->where('name', 100)->get();
        $constructor->query('name', 'nationality');
    }


    public function store(Request $request)
    {
        $constructor = new Constructor();
        $constructor->createConstructor($request->all());
        return response()->json($constructor, 201);
    }


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


    public function update(Request $request,constructor $constructor)
    {
        $constructor->updateConstructor($request->all());

        return response()->json($constructor, 201);
    }

    public function destroy(Constructor $constructor)
    {
        $constructor->delete();
        return response()->json('', 204);
    }

    function validateData(Request $request) {
        $rules=array(
            "constructorRef"=>"required|min:2|max:4",
            "name"=>"required",
        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return response()->json($validator->errors(), 401);
        }
        else {
            $constructor = new Constructor;
            $constructor->constructorRef=$request->constructorRef;
            $constructor->name=$request->name;
            $result=$constructor->save();
            if($result) {
                return ["Result"=>"Data has been saved"];
            } else {
                return ["Result"=>"Operation failed"];
            }
        }
    }
}
