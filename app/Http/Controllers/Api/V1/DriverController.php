<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use App\Http\Resources\DriverResource;
use App\Models\Driver;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = Driver::with('packages')->paginate(10);

        return DriverResource::collection($drivers);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DriverRequest $request)
    {
        $driver = Driver::create($request->validated());

        return new DriverResource($driver);
    }

    /**
     * Display the specified resource.
     */
    public function show(Driver $Driver)
    {
    
        $Driver->load('packages');

        return new DriverResource($Driver);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DriverRequest $request, Driver $Driver)
    {
      
       $Driver->update($request->validated());

        return new DriverResource($Driver);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Driver $Driver)
    {
      $Driver->delete();

      return response()->json(['message'=>'Driver is deleted']);
    }
}
