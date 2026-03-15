<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\OtherRelative;
use App\Models\Relative;
use Illuminate\Http\Request;

class OtherRelativeController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $otherrelatives = OtherRelative::where("user_id", $id)->get();
        return response()->json(["otherrelatives" => $otherrelatives]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $otherrelative = Relative::create([
            "user_id" => $user_id,
            "name" => $request->name,
            "contact" => $request->contact,
            "address" => $request->address,
            "gender" => $request->gender,
            "date_of_birth" => $request->dob,
            "file" => $request->file,
            "type" => "OtherRelative",
        ]);
        return response()->json(["message" => "Inserted", "code" => 200]);
    }

    public function show($id)
    {
        $otherRelative = Relative::where("id", $id)
            ->where("type", "OtherRelative")
            ->where("user_id", Auth::id())
            ->firstOrFail();

        return response()->json(["otherRelative" => $otherRelative]);
    }

    /**
     * Update the specified other relative in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "name" => "nullable|string|max:255",
            "contact" => "nullable|string|max:50",
            "address" => "nullable|string|max:255",
            "gender" => "nullable|string|in:Male,Female",
            "date_of_birth" => "nullable|date",
            "file" => "nullable|file|mimes:jpeg,png,jpg,pdf|max:2048", // Optional file upload
        ]);

        $otherRelative = Relative::where("id", $id)
            ->where("type", "OtherRelative")
            ->where("user_id", Auth::id())
            ->firstOrFail();

        // Handle file upload if present
        if ($request->hasFile("file")) {
            $file = $request->file("file");
            $filePath = $file->store("uploads/other_relatives", "public");

            // Optionally delete the old file
            if ($otherRelative->file) {
                \Storage::delete("public/" . $otherRelative->file);
            }

            $otherRelative->file = $filePath;
        }

        // Update other fields
        $otherRelative->update(array_filter($validated));

        return response()->json([
            "message" => "Other relative updated successfully.",
            "otherRelative" => $otherRelative,
        ]);
    }

    public function destroy(Request $request)
    {
        $otherrelative = OtherRelative::where("id", $request->id)->delete();
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
