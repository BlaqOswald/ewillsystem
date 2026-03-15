<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdvertController extends Controller
{
    /**
     * Fetch all active adverts for display.
     */
    public function view()
    {
        $adverts = Advert::where("status", 1)->get();
        return response()->json(["adverts" => $adverts]);
    }

    /**
     * Show the main advert management page.
     */
    public function index()
    {
        $adverts = Advert::orderBy("id", "DESC")->get();
        return view("advert.index");
    }

    /**
     * Display a specific advert.
     */
    public function show()
    {
        return view("advert.show", [
            "adverts" => Advert::orderBy("id", "DESC")->get(),
        ]);
    }

    /**
     * Store a new advert with file upload.
     */
    public function store(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            "topic" => "required|string|max:255",
            "advert" => "nullable|string",
            "status" => "required|boolean",
            "file" => "nullable|file|mimes:jpg,jpeg,png,pdf|max:2048",
        ]);

        // Convert status to boolean (Laravel handles it automatically, but ensure it's properly received)
        $status = $validated["status"] == "1" ? true : false;

        // Handle file upload
        $filePath = null;

        if ($request->hasFile("file")) {
            $file = $request->file("file");

            // Define file name format
            $fileName =
                "advert_" . time() . "." . $file->getClientOriginalExtension();

            // Move file to the correct public storage location
            $file->move(public_path("storage/uploads/files"), $fileName);

            // Define file path for database storage
            $filePath = "storage/uploads/files/" . $fileName;
        }

        // Create the advert record
        $advert = Advert::create([
            "topic" => $validated["topic"],
            "advert" => $validated["advert"] ?? null,
            "status" => $validated["status"],
            "file" => $filePath,
        ]);

        // Log activity
        Audit::create([
            "activity" => "Created an advert: " . $advert->topic,
            "addedon" => now(),
            "user" => Auth::id(),
        ]);

        return response()->json(
            ["message" => "Advert created successfully", "advert" => $advert],
            200
        );
    }

    /**
     * Update an existing advert.
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            // Find advert, but don’t fail if not found
            $advert = Advert::find($request->id);

            // Check if advert exists
            if (!$advert) {
                return response()->json(["message" => "Advert not found"], 404);
            }

            // Validate request data
            $validated = $request->validate([
                "topic" => "required|string|max:255",
                "advert" => "nullable|string",
                "status" => "required|boolean",
                "file" => "nullable|file|mimes:jpg,jpeg,png,pdf|max:2048",
            ]);
            // Convert status to boolean (Laravel handles it automatically, but ensure it's properly received)
            $status = $validated["status"] == "1" ? true : false;

            // Handle file replacement
            if ($request->hasFile("file")) {
                $file = $request->file("file");
                $fileName =
                    "advert_" .
                    time() .
                    "." .
                    $file->getClientOriginalExtension();

                // Delete old file if it exists
                if (
                    $advert->file &&
                    Storage::disk("public")->exists($advert->file)
                ) {
                    Storage::disk("public")->delete($advert->file);
                }

                // Store new file
                $filePath = $file->storeAs(
                    "uploads/adverts",
                    $fileName,
                    "public"
                );
                $advert->file = $filePath;
            }

            // Update advert details
            $advert->update([
                "topic" => $validated["topic"],
                "advert" => $validated["advert"] ?? $advert->advert,
                "status" => $validated["status"],
                "file" => $advert->file,
            ]);

            // Log activity
            Audit::create([
                "activity" => "Updated an advert: " . $advert->topic,
                "addedon" => now(),
                "user" => Auth::id(),
            ]);

            return response()->json([
                "message" => "Advert updated successfully",
                "advert" => $advert,
            ]);
        }
    }

    /**
     * Delete an advert and its associated file.
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            // Find the advert, but return an error if it's not found
            $advert = Advert::where("id", $request->id)->first();

            if (!$advert) {
                return response()->json(["message" => "Advert not found"], 404);
            }

            // Delete associated file if it exists
            if ($advert->file && file_exists(public_path($advert->file))) {
                unlink(public_path($advert->file)); //  Delete file from public storage
            }

            // Delete the advert record
            $advert->delete();

            // Log activity
            Audit::create([
                "activity" => "Deleted an advert: " . $advert->topic,
                "addedon" => now(),
                "user" => Auth::id(),
            ]);

            return response()->json([
                "message" => "Advert deleted successfully",
            ]);
        }
    }
}
