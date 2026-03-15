<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Heir;
use App\Models\Relative;
use Auth;

class HeirController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $heir = Heir::where('user_id', $id)->get();
        return response()->json(['heir' => $heir]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $heir = Relative::create([
            'user_id'=>$user_id,
            'name'=>$request->name,
            'contact'=>$request->contact,
            'address'=>$request->address,
            'gender'=>$request->gender,
            'date_of_birth'=>$request->dob,
            'type'=>'Heir',
        ]);
        return response()->json(['message'=>'Inserted', 'code'=>200]);
    }

    public function destroy(Request $request)
    {
        $dependant = Heir::where('id', $request->id)->delete();
    }
}
