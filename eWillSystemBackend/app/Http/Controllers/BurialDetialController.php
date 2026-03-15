<?php

namespace App\Http\Controllers;

use App\Models\BurialDetial;
use Auth;
use Illuminate\Http\Request;

class BurialDetialController extends Controller
{
    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $check=BurialDetial::where('user_id', $user_id)->first();
        if($check){
            $item = BurialDetial::find($check->id);
            $item->location = $request->location;
            $item->instructions = $request->instructions;
            $item->save();
        }else {
            $details = BurialDetial::create([
                'user_id'=>$user_id,
                'location'=>$request->location,
                'instructions'=>$request->instructions,
            ]);
        }
        return response()->json(['message'=>'Inserted', 'code'=>200]);
    }
}
