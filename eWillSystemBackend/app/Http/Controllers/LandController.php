<?php

namespace App\Http\Controllers;

use App\Models\Land;
use App\Models\Audit;
use Auth;
use Illuminate\Http\Request;

class LandController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $lands = Land::where("user_id", $id)->get();
        return response()->json(["lands" => $lands]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        // Validate and handle the file upload
        $filePath = null;
        if ($request->hasFile("file")) {
            $file = $request->file("file");
            $filePath = $file->store("uploads/land_files", "public"); // Store file in 'storage/app/public/uploads/land_files'
        }
        // Validate the incoming request data
        $validated = $request->validate([
            "district" => "required|string|max:255",
            "village" => "required|string|max:255",
            "block" => "required|string|max:255",
            "plot" => "required|string|max:255",
            "size" => "required|string|max:255",
            "custodian" => "required|string|max:255",
            "interest_type" => "required|string|max:100",
            "description" => "nullable|string|max:1000",
            "file" => "nullable|file|mimes:jpeg,png,pdf,docx|max:2048", // File validation
        ]);

        // Handle file upload if exists
        $fileName = null;
        if ($request->hasFile("file")) {
            $fileName =
                $request->village .
                time() .
                "." .
                $request->file("file")->getClientOriginalExtension();
            $request->file("file")->move(public_path("property"), $fileName);
        }
        $user_id = Auth::user()->id;
        $land = Land::create([
            "user_id" => $user_id,
            "district" => $request->district,
            "village" => $request->village,
            "block" => $request->block,
            "plot" => $request->plot,
            "size" => $request->size,
            "custodian" => $request->custodian,
            "interest_type" => $request->interest_type,
            "description" => $request->description,
            "file" => $fileName,
        ]);
        return response()->json(["message" => "Inserted", "code" => 200]);
    }

    public function edit(Request $request)
    {
        $land = Land::find($request->id);
        $fileName = null;
        if ($request->hasFile("file")) {
            $fileName =
                $request->village .
                time() .
                "." .
                $request->file("file")->getClientOriginalExtension();
            $request->file("file")->move(public_path("property"), $fileName);
        }
        $land->update([
            "district" => $request->district,
            "village" => $request->village,
            "block" => $request->block,
            "plot" => $request->plot,
            "size" => $request->size,
            "custodian" => $request->custodian,
            "interest_type" => $request->interest_type,
            "description" => $request->description,
            "file" => $fileName,
        ]);
        $audit = Audit::create([
            // "land_id" => $land->id, // Added guardian id
            "user" => Auth::user()->id,
            "activity" => "Updated Land: " . $land->village, // Include the guardian's name
            "addedon" => now()->toDateString(), // Use Carbon to get current date in YYYY-MM-DD format
        ]);
        return response()->json(["message" => "Updated Land", "code" => 200]);
    }

    // Update a land record
    public function update(Request $request)
    {
        $item = Land::find($request->id);
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }

    public function destroy(Request $request)
    {
        $land = Land::where("id", $request->id)->delete();
    }
}
