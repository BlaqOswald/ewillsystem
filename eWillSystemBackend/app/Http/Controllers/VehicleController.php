<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Audit;
use Auth;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $vehicles = Vehicle::where("user_id", $id)->get();
        return response()->json(["vehicles" => $vehicles]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $fileName = null;
        if ($request->hasFile("file")) {
            $fileName =
                $request->name .
                $request->number_plate .
                time() .
                "." .
                $request->file("file")->getClientOriginalExtension();
            $request->file("file")->move(public_path("property"), $fileName);
        }
        $vehicle = Vehicle::create([
            "user_id" => $user_id,
            "name" => $request->name,
            "number_plate" => $request->number_plate,
            "model" => $request->model,
            "color" => $request->color,
            "type" => $request->type,
            "file" => $fileName,
        ]);
        return response()->json(["message" => "Inserted", "code" => 200]);
    }

    public function update(Request $request)
    {
        $item = Vehicle::find($request->id);
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }

    // Show a specific vehicle for the authenticated user
    public function show($id)
    {
        $vehicle = Vehicle::where("id", $id)
            ->where("user_id", Auth::id())
            ->firstOrFail();
        return response()->json(["vehicle" => $vehicle]);
    }
    public function edit(Request $request)
    {
        $vehicle = Vehicle::find($request->id);
        $fileName = null;
        if ($request->hasFile("file")) {
            $fileName =
                $request->name .
                $request->number_plate .
                time() .
                "." .
                $request->file("file")->getClientOriginalExtension();
            $request->file("file")->move(public_path("property"), $fileName);
        }
        $vehicle->update([
            "name" => $request->name,
            "number_plate" => $request->number_plate,
            "model" => $request->model,
            "color" => $request->color,
            "type" => $request->type,
            "file" => $fileName,
        ]);
        $audit = Audit::create([
            // "vehicle_id" => $vehicle->id, // Added guardian id
            "user" => Auth::user()->id,
            "activity" => "Updated Vehicle: " . $vehicle->name, // Include the guardian's name
            "addedon" => now()->toDateString(), // Use Carbon to get current date in YYYY-MM-DD format
        ]);
        return response()->json([
            "message" => "Updated Vehicle",
            "code" => 200,
        ]);
    }
    // Delete a vehicle

    public function destroy(Request $request)
    {
        $vehicle = Vehicle::where("id", $request->id)->delete();
    }
}
