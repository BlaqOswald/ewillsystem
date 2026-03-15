<?php

namespace App\Http\Controllers;

use App\Models\Dependant;
use App\Models\Relative;
use Auth;
use Illuminate\Http\Request;

class DependantController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $dependants = Dependant::where("user_id", $id)->get();
        return response()->json(["dependants" => $dependants]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $dependant = Relative::create([
            "user_id" => $user_id,
            "name" => $request->name,
            "contact" => $request->contact,
            "address" => $request->address,
            "gender" => $request->gender,
            "date_of_birth" => $request->dob,
            "type" => "Dependant",
        ]);
        return response()->json(["message" => "Inserted", "code" => 200]);
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $validated = $request->validate([
            "name" => "nullable|string|max:255",
            "contact" => "nullable|string|max:50",
            "address" => "nullable|string|max:255",
            "gender" => "nullable|string|in:Male,Female",
            "date_of_birth" => "nullable|date",
            "file" => "nullable|file|mimes:jpeg,png,jpg,pdf|max:2048", // Optional file upload
        ]);

        // Find the dependant record
        $dependant = Relative::where("id", $id)
            ->where("type", "Dependant")
            ->firstOrFail();

        // Handle file upload if present
        if ($request->hasFile("file")) {
            $file = $request->file("file");
            $filePath = $file->store("uploads/dependants", "public");

            // Optionally delete the old file if it exists
            if ($dependant->file) {
                $oldFilePath = storage_path("app/public/" . $dependant->file);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            // Update the file path
            $dependant->file = $filePath;
        }

        // Update other fields if provided
        $dependant->update(array_filter($validated)); // `array_filter` removes null values

        return response()->json([
            "message" => "Dependant updated successfully.",
            "dependant" => $dependant,
        ]);
    }

    public function destroy(Request $request)
    {
        $dependant = Dependant::where("id", $request->id)->delete();
    }

    public function deleteFile($id)
    {
        $relative = Relative::find($id);

        if (!$relative) {
            return response()->json([
                "message" => "Relative not found",
                "code" => 404,
            ]);
        }

        // Check if a file exists
        if ($relative->file) {
            $filePath = storage_path("app/public/" . $relative->file);

            // Delete the file from storage
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Set the file column to null
            $relative->update(["file" => null]);
        }

        return response()->json([
            "message" => "File deleted successfully",
            "code" => 200,
        ]);
    }
}
