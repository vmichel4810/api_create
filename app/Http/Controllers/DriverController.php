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
use Illuminate\Support\Facades\DB;



class DriverController extends Controller
{
    public function index()
    {
        return new DriverCollection(Driver::paginate(15));
    }

    public function show($driver)
    {
        if($driver) {
            return new DriverResource($driver);
        }

        return response()->json('driver at not found', 404);

        $driver = new Driver();
        $driver->FindOrFail($driver);

        return Response($driver);
    }

    public function store(Request $request)
    {
        $driver = new Driver();
        $driver->createDriver($request->all());
        return response()->json($driver, 201);
    }

    public function update($request, $driver) {
        $driver->updateDriver($driver->all());

        return response()->json($driver, 201);
    }

    public function destroy($driver) {
        $driver->delete();
        return response()->json('Driver deleted', 204);
    }

}
