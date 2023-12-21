<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Http\Resources\PackageResource;
use App\Models\Package;


class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $package = Package::with('driver');

        return PackageResource::collection($package);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PackageRequest $request)
    {
       $Package=Package::create($request->validated());
       return new PackageResource($Package);
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $Package)
    {
  
            $Package->load('driver');
            return new PackageResource($Package);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PackageRequest $request,Package $Package)
    {
        $Package->update($request->validated());

        return new PackageResource($Package);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $Package)
    {
     $Package->delete();

     return response()->json(['message'=>'Package is deleted']);

    }
}
