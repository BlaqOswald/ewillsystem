<?php

namespace App\Http\Controllers;

use App\Models\Witness;
use Auth;
use Illuminate\Http\Request;

class WitnessController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $witnesss = Witness::where('user_id', $id)->get();
        return response()->json(['witnesss' => $witnesss]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $witness = Witness::create([
            'user_id'=>$user_id,
            'name'=>$request->name,
            'contact'=>$request->contact,
            'address'=>$request->address,
        ]);
        return response()->json(['message'=>'Inserted', 'code'=>200]);
    }
    public function update(Request $request)
    {
        $item = Witness::find($request->id);
        $item->name = $request->name;
        $item->contact = $request->contact;
        $item->address = $request->address;
        $item->save();
    }
    public function destroy(Request $request)
    {
        $witness = Witness::where('id', $request->id)->delete();
    }
}