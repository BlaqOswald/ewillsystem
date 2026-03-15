<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Audit;
use Auth;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $houses = House::where("user_id", $id)->get();
        return response()->json(["houses" => $houses]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $fileName = null;
        if ($request->hasFile("file")) {
            $fileName =
                $request->type .
                time() .
                "." .
                $request->file("file")->getClientOriginalExtension();
            $request->file("file")->move(public_path("property"), $fileName);
        }
        $house = House::create([
            "user_id" => $user_id,
            "type" => $request->type,
            "category" => $request->category,
            "custodian" => $request->custodian,
            "location" => $request->location,
            "plot" => $request->plot,
            "block" => $request->block,
            "file" => $fileName,
        ]);
        return response()->json(["message" => "Inserted", "code" => 200]);
    }

    public function edit(Request $request)
    {
        $house = House::find($request->id);
        $fileName = null;
        if ($request->hasFile("file")) {
            $fileName =
                $request->type .
                time() .
                "." .
                $request->file("file")->getClientOriginalExtension();
            $request->file("file")->move(public_path("property"), $fileName);
        }
        $house->update([
            "type" => $request->type,
            "category" => $request->category,
            "custodian" => $request->custodian,
            "location" => $request->location,
            "plot" => $request->plot,
            "block" => $request->block,
            "file" => $fileName,
        ]);
        $audit = Audit::create([
            // 'house_id' => $house->id, // Added guardian id
            "user" => Auth::user()->id,
            "activity" => "Updated House: " . $house->location, // Include the guardian's name
            "addedon" => now()->toDateString(), // Use Carbon to get current date in YYYY-MM-DD format
        ]);
        return response()->json(["message" => "Updated House", "code" => 200]);
    }
    public function update(Request $request)
    {
        $item = House::find($request->id);
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }

    public function destroy(Request $request)
    {
        $house = House::where("id", $request->id)->delete();
    }
}
