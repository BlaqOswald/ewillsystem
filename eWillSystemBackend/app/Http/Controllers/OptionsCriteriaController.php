<?php

namespace App\Http\Controllers;

use App\Models\OptionsCriteria;
use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OptionsCriteriaController extends Controller
{
    // Display all options in a Blade view
    public function index()
    {
        return view("optionsCriteria.index");
    }

    // Fetch all active options as JSON
    public function view()
    {
        $options = OptionsCriteria::all();

        if ($options->isEmpty()) {
            return response()->json(
                ["message" => "No options available", "options" => []],
                404
            );
        }

        return response()->json(["options" => $options]);
    }

    public function show()
    {
        $options = OptionsCriteria::orderBy("id", "DESC")->get();
        if ($options->isEmpty()) {
            return view("optionsCriteria.show", ["options" => collect()]); // If empty, return an empty collection
        }

        return view("optionsCriteria.show", ["options" => $options]);
    }
    public function getOptionsByCategory($category)
    {
        $options = OptionsCriteria::where("category", $category)
            ->orderBy("id", "DESC")
            ->pluck("value");

        return response()->json($options);
    }

    // Store a new option
    public function store(Request $request)
    {
        $validated = $request->validate([
            "category" => "required|string",
            "value" => "required|string",
        ]);

        $option = OptionsCriteria::create($validated);

        return response()->json([
            "message" => "Option added successfully",
            "code" => 201,
        ]);
        // Get the authenticated user
        $user = Auth::user();
        // Audit Log
        Audit::create([
            "activity" => "Added an option",
            "addedon" => now(),
            "user" => $user->id,
        ]);
    }

    // Update an existing option with AJAX request support
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $option = OptionsCriteria::find($request->id);

            if ($option) {
                $option->update([
                    "category" => $request->category,
                    "value" => $request->value,
                ]);

                return response()->json([
                    "option" => $option,
                    "message" => "Option updated successfully",
                    "code" => 200,
                ]);
            }
        }
        // Get the authenticated user
        $user = Auth::user();
        // Audit Log
        Audit::create([
            "activity" => "Edited an Option",
            "addedon" => now(),
            "user" => $user->id,
        ]);
    }

    // Delete an option by category and value, or by ID
    public function destroy($id)
    {
        $deleted = OptionsCriteria::where("id", $id)->delete(); // Delete option by ID

        if ($deleted) {
            return response()->json([
                "message" => "Option deleted successfully",
                "code" => 200,
            ]);
        }

        return response()->json([
            "message" => "Option not found",
            "code" => 404,
        ]);
        // Get the authenticated user
        $user = Auth::user();
        // Audit Log
        Audit::create([
            "activity" => "Deleted an Option",
            "addedon" => now(),
            "user" => $user->id,
        ]);
    }
}
