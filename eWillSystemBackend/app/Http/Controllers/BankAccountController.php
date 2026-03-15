<?php

namespace App\Http\Controllers;

use App\Models\Audit;
use App\Models\BankAccount;
use Auth;
use Illuminate\Http\Request;

class BankAccountController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $bankaccounts = BankAccount::where("user_id", $id)->get();
        return response()->json(["bankaccounts" => $bankaccounts]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        // Validate the incoming request data
        $validated = $request->validate([
            "account_number" => "required|string|max:255",
            "bank_name" => "required|string|max:255",
            "account_name" => "required|string|max:255",
            "bank_branch" => "required|string|max:255",
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
        // Create the new bank account record

        $bankaccount = BankAccount::create([
            "user_id" => $user_id,
            "account_number" => $request->account_number,
            "bank_name" => $request->bank_name,
            "account_name" => $request->account_name,
            "branch" => $request->bank_branch,
            "file" => $fileName,
        ]);

        return response()->json(["message" => "Inserted", "code" => 200]);
    }

    public function update(Request $request)
    {
        $item = BankAccount::find($request->id);
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }

    public function edit(Request $request)
    {
        $bankaccount = BankAccount::find($request->id);
        $fileName = null;
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
        $bankaccount->update([
            "account_number" => $request->account_number,
            "bank_name" => $request->bank_name,
            "account_name" => $request->account_name,
            "branch" => $request->bank_branch,
            "file" => $fileName,
        ]);
        $audit = Audit::create([
            // "bankaccount_id" => $bankaccount->id, // Added guardian id
            "user" => Auth::user()->id,
            "activity" => "Updated Bank Account: " . $bankaccount->type, // Include the guardian's name
            "addedon" => now()->toDateString(), // Use Carbon to get current date in YYYY-MM-DD format
        ]);
        return response()->json([
            "message" => "Updated Bankaccount",
            "code" => 200,
        ]);
    }
    // Delete a bank account record

    public function destroy(Request $request)
    {
        $bankaccount = BankAccount::where("id", $request->id)->delete();
    }
}
