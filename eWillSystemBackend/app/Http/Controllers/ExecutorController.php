<?php

namespace App\Http\Controllers;

use App\Models\Executor;
use Auth;
use Illuminate\Http\Request;

class ExecutorController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $executors = Executor::where("user_id", $id)->get();
        return response()->json(["executors" => $executors]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $executor = Executor::create([
            "user_id" => $user_id,
            "name" => $request->name,
            "contact" => $request->contact,
            "address" => $request->address,
            // "file" => $request->executor_file,
        ]);
        return response()->json(["message" => "Inserted", "code" => 200]);
    }
    public function update(Request $request)
    {
        $item = Executor::find($request->id);
        $item->name = $request->name;
        $item->contact = $request->contact;
        $item->address = $request->address;
        $item->save();
    }
    public function destroy(Request $request)
    {
        $executor = Executor::where("id", $request->id)->delete();
    }
}
