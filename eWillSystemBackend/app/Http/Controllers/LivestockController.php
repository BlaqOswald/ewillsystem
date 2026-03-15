<?php

namespace App\Http\Controllers;

use App\Models\Livestock;
use App\Models\Audit;
use Auth;
use Illuminate\Http\Request;

class LivestockController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $livestocks = Livestock::where("user_id", $id)->get();
        return response()->json(["livestocks" => $livestocks]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        // Validate the incoming request data
        $validated = $request->validate([
            "type" => "required|string|max:255",
            "number" => "required|integer",
            "location_owner" => "required|string|max:255",
            "location" => "required|string|max:255",
        ]);
        $fileName = null;
        if ($request->hasFile("file")) {
            $fileName =
                $request->type .
                $request->number .
                time() .
                "." .
                $request->file("file")->getClientOriginalExtension();
            $request->file("file")->move(public_path("property"), $fileName);
        }
        // Create the new livestock record

        $livestock = Livestock::create([
            "user_id" => $user_id,
            "type" => $request->type,
            "number" => $request->number,
            "location_owner" => $request->location_owner,
            "location" => $request->location,
            "file" => $fileName,
        ]);
        return response()->json(["message" => "Inserted", "code" => 200]);
    }

    public function update(Request $request)
    {
        $item = Livestock::find($request->id);
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }

    public function edit(Request $request)
    {
        $livestock = Livestock::find($request->id);
        $fileName = null;
        if ($request->hasFile("file")) {
            $fileName =
                $request->type .
                $request->number .
                time() .
                "." .
                $request->file("file")->getClientOriginalExtension();
            $request->file("file")->move(public_path("property"), $fileName);
        }
        $livestock->update([
            "type" => $request->type,
            "number" => $request->number,
            "location_owner" => $request->location_owner,
            "location" => $request->location,
            "file" => $fileName,
        ]);
        $audit = Audit::create([
            // "livestock_id" => $livestock->id, // Added guardian id
            "user" => Auth::user()->id,
            "activity" => "Updated Livestock: " . $livestock->type, // Include the guardian's name
            "addedon" => now()->toDateString(), // Use Carbon to get current date in YYYY-MM-DD format
        ]);
        return response()->json([
            "message" => "Updated Livestock",
            "code" => 200,
        ]);
    }
    // Delete a livestock record

    public function destroy(Request $request)
    {
        $livestock = Livestock::where("id", $request->id)->delete();
    }
}
