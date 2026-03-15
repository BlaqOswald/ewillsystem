<?php

namespace App\Http\Controllers;

use App\Models\Creditor;
use App\Models\Audit;
use Auth;
use Illuminate\Http\Request;

class CreditorController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $creditors = Creditor::where("user_id", $id)->get();
        return response()->json(["creditors" => $creditors]);
    }

    public function store(Request $request)
    {
        $fileName = null;
        if ($request->hasFile("file")) {
            $fileName =
                $request->name .
                time() .
                "." .
                $request->file("file")->getClientOriginalExtension();
            $request->file("file")->move(public_path("creditors"), $fileName);
        }
        $user_id = Auth::user()->id;
        $creditor = Creditor::create([
            "user_id" => $user_id,
            "name" => $request->name,
            "contact" => $request->contact,
            "address" => $request->address,
            "amount" => $request->amount,
            "description" => $request->description,

            "file" => $request->file,

            "file" => $fileName,
        ]);
        $audit = Audit::create([
            "user" => Auth::user()->id,
            "activity" => "Added Creditor: " . $request->name, // Include the guardian's name
            "addedon" => now()->toDateString(), // Use Carbon to get current date in YYYY-MM-DD format
        ]);
        return response()->json(["message" => "Inserted", "code" => 200]);
    }

    public function show($id)
    {
        $creditor = Creditor::where("id", $id)
            ->where("user_id", Auth::id())
            ->firstOrFail();

        return response()->json(["creditor" => $creditor]);
    }

    /**
     * Update the specified creditor in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "name" => "nullable|string|max:255",
            "contact" => "nullable|string|max:50",
            "address" => "nullable|string|max:255",
            "amount" => "nullable|numeric|min:0",
            "description" => "nullable|string|max:500",
            "file" => "nullable|file|mimes:jpeg,png,jpg,pdf|max:2048", // Optional file upload
        ]);

        $creditor = Creditor::where("id", $id)
            ->where("user_id", Auth::id())
            ->firstOrFail();

        // Handle file upload if present
        if ($request->hasFile("file")) {
            $file = $request->file("file");
            $filePath = $file->store("uploads/creditors", "public");

            // Optionally delete the old file
            if ($creditor->file) {
                \Storage::delete("public/" . $creditor->file);
            }

            $creditor->file = $filePath;
        }

        // Update other fields
        $creditor->update(array_filter($validated));

        return response()->json([
            "message" => "Creditor updated successfully.",
            "creditor" => $creditor,
        ]);
    }

    public function edit(Request $request)
    {
        $creditor = Creditor::find($request->id);
        $creditor->update([
            "name" => $request->name,
            "contact" => $request->contact,
            "address" => $request->address,
            "amount" => $request->amount,
            "description" => $request->description,
        ]);
        $audit = Audit::create([
            // "creditor_id" => $creditor->id, // Added guardian id
            "user" => Auth::user()->id,
            "activity" => "Updated Creditor: " . $creditor->name, // Include the guardian's name
            "addedon" => now()->toDateString(), // Use Carbon to get current date in YYYY-MM-DD format
        ]);
        return response()->json([
            "message" => "Updated Creditor",
            "code" => 200,
        ]);
    }

    public function destroy(Request $request)
    {
        $creditor = Creditor::where("id", $request->id)->delete();
    }
}
