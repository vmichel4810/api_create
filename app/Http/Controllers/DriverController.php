<?php

namespace App\Http\Controllers;
//resources
use App\Http\Resources\DriverResource;
use App\Http\Resources\DriverCollection;
//models
use App\Models\Driver;
//illuminate
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;


class DriverController extends Controller
{
    public function index()
    {
        return new DriverCollection(Driver::paginate(15));
    }

    public function show($id)
    {
        $driver = Driver::find($id);
        if($driver) {
            return new DriverResource($driver);
        }

        return response()->json('driver not found', 404);

    }

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

    public function destroy(Driver $driver) {
        
        $driver->delete();
        return response()->json('Driver deleted', 204);
    }

}
