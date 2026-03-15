<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\Relative;
use App\Models\Audit;
use Auth;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $children = Child::where("user_id", $id)->get();
        return response()->json(["children" => $children]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $child = Relative::create([
            "user_id" => $user_id,
            "name" => $request->name,
            "contact" => $request->contact,
            "address" => $request->address,
            "gender" => $request->gender,
            "date_of_birth" => $request->dob,
            "life_status" => $request->status,

            "file" => $request->file,

            // "file" => $request->file,

            "type" => "Child",
        ]);
        return response()->json(["message" => "Inserted", "code" => 200]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "name" => "nullable|string|max:255",
            "contact" => "nullable|string|max:50",
            "address" => "nullable|string|max:255",
            "gender" => "nullable|string|in:Male,Female",
            "date_of_birth" => "nullable|date",
            "life_status" => "nullable|string|in:Alive,Deceased",
            "file" => "nullable|file|mimes:jpeg,png,jpg,pdf|max:2048",
        ]);
        $child = Relative::where("id", $id)
            ->where("type", "Child")
            ->firstOrFail();

        if ($request->hasFile("file")) {
            $file = $request->file("file");
            $filePath = $file->store("uploads/children", "public");

            if ($child->file) {
                \Storage::delete("public/" . $child->file);
            }
            $child->file = $filePath;
        }

        $child->update(array_filter($validated));

        return response()->json([
            "message" => "Child updated successfully.",
            "child" => $child,
        ]);
    }

    public function destroy(Request $request)
    {
        $child = Relative::where("id", $request->id)->delete();
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

    public function edit(Request $request)
    {
        $relative = Relative::find($request->id);
        $relative->update([
            "name" => $request->name,
            "contact" => $request->contact,
            "address" => $request->address,
            "date_of_birth" => $request->dob,
            "gender" => $request->gender,
            "life_status" => $request->status,
            "mariage" => $request->marriage,
            "type" => $request->type,
        ]);
        $audit = Audit::create([
            // "relative_id" => $relative->id, // Added guardian id
            "user" => Auth::user()->id,
            "activity" => "Updated Relative: " . $relative->name, // Include the guardian's name
            "addedon" => now()->toDateString(), // Use Carbon to get current date in YYYY-MM-DD format
        ]);
        return response()->json([
            "message" => "Updated Relative",
            "code" => 200,
        ]);
    }
}
