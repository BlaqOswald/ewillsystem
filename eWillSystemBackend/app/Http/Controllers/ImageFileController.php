<?php

namespace App\Http\Controllers;

use App\Models\Relative;
use App\Models\Child;
use App\Models\Spouse;
use App\Models\Dependant;
use App\Models\Guardian;
use App\Models\OtherRelative;
use App\Models\Creditor;
use App\Models\Debtor;
use App\Models\Land;
use App\Models\Vehicle;
use App\Models\BankAccount;
use App\Models\House;
use App\Models\Livestock;
use App\Models\Share;
use App\Models\OtherProperty;
use App\Models\User;
use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageFileController extends Controller
{
    public function uploadFile(Request $request)
    {
        $validated = $request->validate([
            "type" => "required|string",
            "userId" => "required|integer",
            "id" => "required|integer",
            "fileUpload" => "required|file|mimes:jpg,jpeg,png,pdf|max:2048",
        ]);

        // Retrieve file and generate the file name
        $type = $validated["type"];
        $relatorId = $validated["id"];
        $userId = $validated["userId"];
        $fileUpload = $validated["fileUpload"];

        // Generate unique file name
        $fileName =
            $type .
            "_" .
            time() .
            "." .
            $fileUpload->getClientOriginalExtension();

        // Move file to storage location
        $fileUpload->move(public_path("storage/uploads/files"), $fileName);
        $filePath = "storage/uploads/files/" . $fileName;

        // Handle different model types
        $record = match ($type) {
            "Relative" => Relative::where("id", $relatorId)
                ->where("user_id", $userId)
                ->first(),
            "Creditor" => Creditor::where("id", $relatorId)
                ->where("user_id", $userId)
                ->first(),
            "Debtor" => Debtor::where("id", $relatorId)
                ->where("user_id", $userId)
                ->first(),
            "Land" => Land::where("id", $relatorId)
                ->where("user_id", $userId)
                ->first(),
            "Livestock" => Livestock::where("id", $relatorId)
                ->where("user_id", $userId)
                ->first(),
            "BankAccount" => Bankaccount::where("id", $relatorId)
                ->where("user_id", $userId)
                ->first(),
            "Share" => Share::where("id", $relatorId)
                ->where("user_id", $userId)
                ->first(),
            "Vehicle" => Vehicle::where("id", $relatorId)
                ->where("user_id", $userId)
                ->first(),
            "OtherProperty" => OtherProperty::where("id", $relatorId)
                ->where("user_id", $userId)
                ->first(),
            default => null,
        };

        if (!$record) {
            return response(["message" => "Record not found"], 404);
        }

        // Update the file name in the corresponding model
        $record->update([
            // "file" => $filePath,
            "file" => $fileName, // Save the file name
        ]);

        return response([
            "message" => "File Uploaded Successfully",
            "file" => $filePath,
            "file_name" => $fileName, // Return the file name
        ]);
        // Get the authenticated user
        $user = Auth::user();
        // Audit Log
        Audit::create([
            "activity" => "Uploaded a file",
            "addedon" => now(),
            "user" => $user->id,
        ]);
    }

    public function deleteFile(Request $request)
    {
        // Validate request data
        $request->validate([
            "relation" => "required|string",
            "file" => "required|string",
            "userId" => "required|integer",
            "id" => "required|integer",
        ]);

        $type = $request->input("relation");
        $file = $request->input("file");
        $userId = $request->input("userId");
        $relatorId = $request->input("id");

        // Find the record based on relation and ID
        $record = match ($type) {
            "Relative" => Relative::where("id", $relatorId)
                ->where("user_id", $userId)
                ->first(),
            "Creditor" => Creditor::where("id", $relatorId)
                ->where("user_id", $userId)
                ->first(),
            "Debtor" => Debtor::where("id", $relatorId)
                ->where("user_id", $userId)
                ->first(),
            "Land" => Land::where("id", $relatorId)
                ->where("user_id", $userId)
                ->first(),
            "Livestock" => Livestock::where("id", $relatorId)
                ->where("user_id", $userId)
                ->first(),
            "BankAccount" => Bankaccount::where("id", $relatorId)
                ->where("user_id", $userId)
                ->first(),
            "Share" => Share::where("id", $relatorId)
                ->where("user_id", $userId)
                ->first(),
            "Vehicle" => Vehicle::where("id", $relatorId)
                ->where("user_id", $userId)
                ->first(),
            "OtherProperty" => OtherProperty::where("id", $relatorId)
                ->where("user_id", $userId)
                ->first(),
            default => null,
        };

        // Ensure the record exists
        if (!$record) {
            return response()->json(["message" => "Record not found"], 404);
        }

        // Check if file exists and delete it
        $filePath = public_path("storage/uploads/files/") . $type . $file;
        if (file_exists($filePath)) {
            unlink($filePath); // Delete the file
        }

        // Optionally update the database to remove the file reference
        $record->update(["file" => null]);

        return response()->json(["message" => "File deleted successfully"]);

        // Get the authenticated user
        $user = Auth::user();
        // Audit Log
        Audit::create([
            "activity" => "Deleted a file",
            "addedon" => now(),
            "user" => $user->id,
        ]);
    }

    public function index()
    {
        // Fetch all users
        $users = User::select(
            "id",
            "email",
            "contact",
            "first_name",
            "last_name"
        )->get();

        // Fetch data for all users
        $children = Relative::with(
            "ruser:id,email,contact,first_name,last_name"
        )
            ->where("type", "Child")
            ->where("file", !"N/A")
            ->get();
        $spouses = Relative::with("ruser:id,email,contact,first_name,last_name")
            ->where("type", "Spouse")
            ->where("file", !"N/A")
            ->get();
        $guardians = Relative::with(
            "ruser:id,email,contact,first_name,last_name"
        )
            ->where("type", "Guardian")
            ->where("file", !"N/A")
            ->get();
        $dependants = Relative::with(
            "ruser:id,email,contact,first_name,last_name"
        )
            ->where("type", "Dependant")
            ->where("file", !"N/A")
            ->get();
        $otherrelatives = Relative::with(
            "ruser:id,email,contact,first_name,last_name"
        )
            ->where("type", "OtherRelative")
            ->where("file", !"N/A")
            ->get();
        $creditors = Creditor::with(
            "ruser:id,email,contact,first_name,last_name"
        )
            ->where("file", !"N/A")
            ->get();
        $debtors = Debtor::with("ruser:id,email,contact,first_name,last_name")
            ->where("file", !"N/A")
            ->get();
        $lands = Land::with("ruser:id,email,contact,first_name,last_name")
            ->where("file", !"N/A")
            ->get();
        $vehicles = Vehicle::with("ruser:id,email,contact,first_name,last_name")
            ->where("file", !"N/A")
            ->get();
        $bankaccounts = BankAccount::with(
            "ruser:id,email,contact,first_name,last_name"
        )
            ->where("file", !"N/A")
            ->get();
        $houses = House::with("ruser:id,email,contact,first_name,last_name")
            ->where("file", !"N/A")
            ->get();
        $shares = Share::with("ruser:id,email,contact,first_name,last_name")
            ->where("file", !"N/A")
            ->get();
        $livestocks = Livestock::with(
            "ruser:id,email,contact,first_name,last_name"
        )
            ->where("file", !"N/A")
            ->get();
        $otherproperties = OtherProperty::with(
            "ruser:id,email,contact,first_name,last_name"
        )
            ->where("file", !"N/A")
            ->get();

        // Pass all data to the Blade view
        return view(
            "imagesDocuments.index",
            compact(
                "users",
                "children",
                "spouses",
                "guardians",
                "dependants",
                "otherrelatives",
                "creditors",
                "debtors",
                "lands",
                "vehicles",
                "bankaccounts",
                "houses",
                "shares",
                "livestocks",
                "otherproperties"
            )
        );
    }
}

// $business = Auth::user()->business;
// if ($request->logo) {
//     $logoName = $business . '' . time() . '.' . $request->logo->getClientOriginalExtension();
//     $request->logo->move(public_path('logos'), $logoName);
//     $logolabel = $request->logo->getClientOriginalName();
//     $item = Business::find($business);
//     $item->update(['logo' => $logoName]);
// }
// return response(['message' => 'Profile Updated']);
