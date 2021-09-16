<?php

namespace App\Http\Controllers;
//resources
use App\Http\Resources\ConstructorResource;
use App\Http\Resources\ConstructorCollection;
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


    public function show($constructor)
    {
        if($constructor) {
            return new ConstructorResource($constructor);
        }

        return response()->json('driver at not found', 404);

        $constructor = new Constructor();
        $constructor->FindOrFail($constructor);

        return Response($constructor);
    }


    public function update(Request $request, $constructor)
    {
        $constructor->updateConstructor($constructor->all());

        return response()->json($constructor, 201);
    }

    public function destroy($constructor)
    {
        $constructor->delete();
        return response()->json('Driver deleted', 204);
    }
}
