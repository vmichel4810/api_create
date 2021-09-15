<?php

namespace App\Http\Controllers;

use App\Http\Resources\DriverResource;

use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;


class DriverController extends Controller
{
    public function index()
    {
        $driver = DB::table('driver')->paginate(15);

        return view('driver.index', ['driver' => $driver]);
        return Response(Driver::all());
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
        return response()->json($driver, 281);
    }

    public function update($request, $driver) {
        $driver->updateDriver($driver->all());

        return response()->json($driver, 281);
    }

    public function destroy($driver) {
        $driver->delete();
        return response()->json('Driver deleted', 204);
    }

}
