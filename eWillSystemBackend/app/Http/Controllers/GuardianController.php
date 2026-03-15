<?php

namespace App\Http\Controllers;

use App\Models\Guardian;
use App\Models\User;
use App\Models\Audit;
use Auth;
use Illuminate\Http\Request;

class GuardianController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $guardians = Guardian::where("user_id", $id)->get();
        return response()->json(["guardians" => $guardians]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $guardian = Guardian::create([
            "user_id" => $user_id,
            "name" => $request->name,
            "contact" => $request->contact,
            "address" => $request->address,
            "gender" => $request->gender,
        ]);
        return response()->json(["message" => "Inserted", "code" => 200]);
    }

    public function show($id)
    {
        $guardian = Guardian::where("id", $id)
            ->where("user_id", Auth::id())
            ->firstOrFail();

        return response()->json(["guardian" => $guardian]);
    }

    /**
     * Update the specified guardian in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "name" => "nullable|string|max:255",
            "contact" => "nullable|string|max:50",
            "address" => "nullable|string|max:255",
            "gender" => "nullable|string|in:Male,Female",
            "file" => "nullable|file|mimes:jpeg,png,jpg,pdf|max:2048", // Optional file upload
        ]);

        $guardian = Guardian::where("id", $id)
            ->where("user_id", Auth::id())
            ->firstOrFail();

        // Handle file upload if present
        if ($request->hasFile("file")) {
            $file = $request->file("file");
            $filePath = $file->store("uploads/guardians", "public");

            // Optionally delete the old file
            if ($guardian->file) {
                \Storage::delete("public/" . $guardian->file);
            }

            $guardian->file = $filePath;
        }

        // Update other fields
        $guardian->update(array_filter($validated));

        return response()->json([
            "message" => "Guardian updated successfully.",
            "guardian" => $guardian,
        ]);
    }
    public function edit(Request $request)
    {
        $guardian = Guardian:: find($request->id);
        $guardian->update([
            'name'=>$request->name,
            'contact'=>$request->contact,
            'address'=>$request->address,
            'gender'=>$request->gender,
        ]);
        $audit = Audit::create([
            // 'guardian_id' => $guardian->id, // Added guardian id
            'user' => Auth::user()->id,
            'activity' => 'Updated Guardian: ' . $guardian->name, // Include the guardian's name
            'addedon' => now()->toDateString(), // Use Carbon to get current date in YYYY-MM-DD format
        ]);
        return response()->json(['message'=>'Updated Guaridan', 'code'=>200]);
    }
    public function destroy(Request $request)
    {
        $guardian = Guardian::where("id", $request->id)->delete();
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
