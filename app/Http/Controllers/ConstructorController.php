<?php

namespace App\Http\Controllers;
//resources
use App\Http\Resources\ConstructorResource;
use App\Http\Resources\ConstructorCollection;
//models
use App\Models\Constructor;
//illuminate
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;


class ConstructorController extends Controller
{

    public function index()
    {
        return new ConstructorCollection(Constructor::paginate(15));
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
}
