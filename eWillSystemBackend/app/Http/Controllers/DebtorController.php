<?php

namespace App\Http\Controllers;

use App\Models\Debtor;
use App\Models\Audit;
use Auth;
use Illuminate\Http\Request;

class DebtorController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $debtors = Debtor::where("user_id", $id)->get();
        return response()->json(["debtors" => $debtors]);
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
            $request->file("file")->move(public_path("debtors"), $fileName);
        }
        $user_id = Auth::user()->id;
        $debtor = Debtor::create([
            "user_id" => $user_id,
            "name" => $request->name,
            "contact" => $request->contact,
            "address" => $request->address,
            "amount" => $request->amount,
            "description" => $request->description,

            "file" => $request->file,

            "file" => $fileName,
        ]);
        return response()->json(["message" => "Inserted", "code" => 200]);
    }

    public function destroy(Request $request)
    {
        $debtor = Debtor::where("id", $request->id)->delete();
    }
    public function edit(Request $request)
    {
        $debtor = Debtor::find($request->id);
        $debtor->update([
            "name" => $request->name,
            "contact" => $request->contact,
            "address" => $request->address,
            "amount" => $request->amount,
            "description" => $request->description,
        ]);
        $audit = Audit::create([
            // "debtor_id" => $debtor->id, // Added guardian id
            "user" => Auth::user()->id,
            "activity" => "Updated Debtor: " . $debtor->name, // Include the guardian's name
            "addedon" => now()->toDateString(), // Use Carbon to get current date in YYYY-MM-DD format
        ]);
        return response()->json(["message" => "Updated Debtor", "code" => 200]);
    }
}
