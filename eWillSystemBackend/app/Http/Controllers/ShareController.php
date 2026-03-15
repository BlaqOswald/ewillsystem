<?php

namespace App\Http\Controllers;

use App\Models\Share;
use App\Models\Audit;
use Auth;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $shares = Share::where("user_id", $id)->get();
        return response()->json(["shares" => $shares]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        // Validate the incoming request data
        $validated = $request->validate([
            "percentage" => "required|numeric|min:0|max:100", // Percentage validation
            "organisation" => "required|string|max:255", // Organisation name validation
        ]);
        $fileName = null;
        if ($request->hasFile("file")) {
            $fileName =
                $request->bank_name .
                $request->account_name .
                time() .
                "." .
                $request->file("file")->getClientOriginalExtension();
            $request->file("file")->move(public_path("property"), $fileName);
        }
        // Create the new share record

        $share = Share::create([
            "user_id" => $user_id,
            "percentage" => $request->percentage,
            "organisation" => $request->organisation,
            "file" => $fileName,
        ]);
        return response()->json(["message" => "Inserted", "code" => 200]);
    }

    public function update(Request $request)
    {
        $item = Share::find($request->id);
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }

    public function edit(Request $request)
    {
        $share = Share::find($request->id);
        $fileName = null;
        if ($request->hasFile("file")) {
            $fileName =
                $request->organisation .
                $request->percentage .
                time() .
                "." .
                $request->file("file")->getClientOriginalExtension();
            $request->file("file")->move(public_path("property"), $fileName);
        }
        $share->update([
            "percentage" => $request->percentage,
            "organisation" => $request->organisation,
            "file" => $fileName,
        ]);
        $audit = Audit::create([
            // "share_id" => $share->id, // Added guardian id
            "user" => Auth::user()->id,
            "activity" => "Updated Share: " . $share->organisation, // Include the guardian's name
            "addedon" => now()->toDateString(), // Use Carbon to get current date in YYYY-MM-DD format
        ]);
        return response()->json(["message" => "Updated Share", "code" => 200]);
    }
    // Delete a share record

    public function destroy(Request $request)
    {
        $share = Share::where("id", $request->id)->delete();
    }
}
