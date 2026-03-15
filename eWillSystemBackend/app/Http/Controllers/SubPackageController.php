<?php namespace App\Http\Controllers;

use App\Models\SubPackage;
use App\Models\User;
use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class SubPackageController extends Controller
{
    public function view()
    {
        $packages = SubPackage::all();
        return response()->json(["packages" => $packages]);
    }
    public function index()
    {
        return view("spackages.index");
    }

    // Display packages in a show view
    public function show()
    {
        $packages = SubPackage::all();

        // For regular web requests, return the Blade view
        return view("spackages.show", compact("packages"));
    }

    // Store a newly created package
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "price" => "required|numeric|min:0|max:99999999.99",
            "description" => "nullable|string",
            "storage_limit" => "nullable|integer",
            "support_level" => "required|string",
            "consultation_included" => "boolean",
        ]);

        SubPackage::create($request->all()); // Store the new package
        return redirect()
            ->route("spackages.index")
            ->with("success", "SubPackage created successfully.");

        // Get the authenticated user
        $user = Auth::user();
        // Audit Log
        Audit::create([
            "activity" => "Created a package",
            "addedon" => now(),
            "user" => $user->id,
        ]);
    }

    // Show form to edit a specific package (for use with a modal)
    public function edit($id)
    {
        if (!auth()->user()->can("edit spackages")) {
            return response()->json(["message" => "Unauthorized"], 403);
        }

        $package = SubPackage::findOrFail($id);

        return response()->json([
            "success" => true,
            "data" => $package,
        ]);
    }

    // Update the specified package
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "price" => "required|numeric|min:0|max:99999999.99",
            "description" => "nullable|string",
            "storage_limit" => "nullable|integer",
            "support_level" => "required|string",
            "consultation_included" => "boolean",
        ]);

        $package = SubPackage::findOrFail($id);
        $package->update($request->all());

        if ($request->ajax()) {
            return response()->json([
                "success" => true,
                "message" => "SubPackage updated successfully.",
            ]);
        }
        // Get the authenticated user
        $user = Auth::user();
        // Audit Log
        Audit::create([
            "activity" => "Updated a package",
            "addedon" => now(),
            "user" => $user->id,
        ]);
        return redirect()
            ->route("spackages.index")
            ->with("success", "SubPackage updated successfully.");
    }

    public function destroy($id)
    {
        // Attempt to delete the package by ID
        $deleted = SubPackage::where("id", $id)->delete();

        if ($deleted) {
            // Log the deletion to the audit log
            Audit::create([
                "activity" => "Deleted SubPackage",
                "addedon" => now(),
                "user" => auth()->id(),
            ]);

            // Return a successful response
            return response()->json([
                "message" => "SubPackage deleted successfully",
                "code" => 200,
            ]);
        }
        // Get the authenticated user
        $user = Auth::user();
        // Audit Log
        Audit::create([
            "activity" => "Removed a package",
            "addedon" => now(),
            "user" => $user->id,
        ]);
        // Return a 404 response
        return response()->json([
            "message" => "SubPackage not found",
            "code" => 404,
        ]);
    }
}
