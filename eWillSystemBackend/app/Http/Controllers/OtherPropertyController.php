<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OtherProperty;
use App\Models\Audit;
use Auth;

class OtherPropertyController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $otherproperties = OtherProperty::where("user_id", $id)->get();
        return response()->json(["otherproperties" => $otherproperties]);
    }

    public function store(Request $request)
    {

        $user_id = Auth::user()->id;
        // $otherproperties = OtherProperty::create([
        //     "user_id" => $user_id,

        // Validate the incoming request data
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "number" => "required|string|max:255",
            "description" => "required|string|max:255",
        ]);
        $fileName = null;
        if ($request->hasFile('file')) {
              $fileName = $request->name . time() . '.' . $request->file('file')->getClientOriginalExtension();
              $request->file('file')->move(public_path('property'), $fileName);
          }
        // Create the new other property record
        $otherproperty = OtherProperty::create([
            "user_id" => Auth::user()->id,

            "name" => $request->name,
            "number" => $request->number,
            "description" => $request->description,
            'file'=>$fileName,

        ]);
        return response()->json(["message" => "Inserted", "code" => 200]);
    }

    public function update(Request $request)
    {
        $item = OtherProperty::find($request->id);
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }

    public function edit(Request $request)
    {
        $otherproperty = Otherproperty:: find($request->id);
        $fileName = null;
        if ($request->hasFile('file')) {
              $fileName = $request->name. time() . '.' . $request->file('file')->getClientOriginalExtension();
              $request->file('file')->move(public_path('property'), $fileName);
          }
        $otherproperty->update([
           "name" => $request->name,
            "number" => $request->number,
            "description" => $request->description,
            'file'=>$fileName,
        ]);
        $audit = Audit::create([
            // 'otherproperty_id' => $otherproperty->id, // Added guardian id
            'user' => Auth::user()->id,
            'activity' => 'Updated Otherproperty: ' . $otherproperty->name, // Include the guardian's name
            'addedon' => now()->toDateString(), // Use Carbon to get current date in YYYY-MM-DD format
        ]);
        return response()->json(['message'=>'Updated Otherproperty', 'code'=>200]);
    }
    // Delete an existing other property record

    public function destroy(Request $request)
    {
        $otherproperty = OtherProperty::where("id", $request->id)->delete();
    }
}
