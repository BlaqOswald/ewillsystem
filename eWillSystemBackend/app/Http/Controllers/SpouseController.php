<?php

namespace App\Http\Controllers;

use App\Models\Relative;
use App\Models\Spouse;
use Auth;
use Illuminate\Http\Request;

class SpouseController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        // Fetch spouses along with user relationship
        $spouses = Relative::where("user_id", $id)
            ->where("type", "Spouse")
            ->with("user:id,email,contact") // Include user data
            ->get();

        return response()->json(["spouses" => $spouses]);
    }
    // public function store(Request $request)
    // {
    //     $user_id = Auth::user()->id;
    //     $spouse = Relative::create([
    //         "user_id" => $user_id,
    //         "name" => $request->name,
    //         "contact" => $request->contact,
    //         "address" => $request->address,
    //         "mariage" => $request->mariage,
    //         "fileupload" => $request->file,
    //         "type" => "Spouse",
    //         if ($request->hasFile('fileupload')) {
    //             $fileName = $item->name . time() . '.' . $request->file->getClientOriginalExtension();
    //             $filePath = $request->file->move(public_path('relatives'), $fileName);
    //             $item->file = $fileName; // Save only the file name
    //         }
    //     ]);
    //     return response()->json(["message" => "Inserted", "code" => 200]);
    // }
    public function store(Request $request)
{
    $user_id = Auth::user()->id;

    $fileName = null;
    if ($request->hasFile('file')) {
        $fileName = $request->name . time() . '.' . $request->file('file')->getClientOriginalExtension();
        $request->file('file')->move(public_path('relatives'), $fileName);
    }

    $spouse = Relative::create([
        "user_id" => $user_id,
        "name" => $request->name,
        "contact" => $request->contact,
        "address" => $request->address,
        "mariage" => $request->mariage,
        "file" => $fileName,
        "type" => "Spouse",
    ]);

    return response()->json(["message" => "Inserted", "code" => 200]);
}

    public function show($id)
    {
        $spouse = Relative::where("id", $id)
            ->where("type", "Spouse")
            ->where("user_id", Auth::id())
            ->with("user:id,email,contact") // Include user data
            ->firstOrFail();

        return response()->json(["spouse" => $spouse]);
    }

    /**
     * Update the specified spouse in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "name" => "nullable|string|max:255",
            "contact" => "nullable|string|max:50",
            "address" => "nullable|string|max:255",
            "mariage" => "nullable|string|max:255",
            "file" => "nullable|file|mimes:jpeg,png,jpg,pdf|max:2048", // Optional file upload
        ]);

        $spouse = Relative::where("id", $id)
            ->where("type", "Spouse")
            ->where("user_id", Auth::id())
            ->firstOrFail();

        // Handle file upload if present
        if ($request->hasFile("file")) {
            $file = $request->file("file");
            $filePath = $file->store("uploads/spouses", "public");

            // Optionally delete the old file
            if ($spouse->file) {
                \Storage::delete("public/" . $spouse->file);
            }

            $spouse->file = $filePath;
        }

        // Update other fields
        $spouse->update(array_filter($validated));

        return response()->json([
            "message" => "Spouse updated successfully.",
            "spouse" => $spouse,
        ]);
    }

    public function destroy(Request $request)
    {
        $spouse = Spouse::where("id", $request->id)->delete();
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
