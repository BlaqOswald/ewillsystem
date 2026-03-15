<?php

namespace App\Http\Controllers;

use App\Models\HouseDisposition;
use App\Models\House;
use Illuminate\Http\Request;
use App\Http\Resources\HouseResource;
use Auth;

class HouseDispositionController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $housedispositiondetails = House::where('user_id', $id)->get();
        return response()->json(['housedispositiondetails' =>HouseResource::collection($housedispositiondetails)]);
        
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $housedispositiondetails = HouseDisposition::create([
            'user_id'=>$user_id,
            'property_id'=>$request->id,
            'size'=>$request->size,
            'detail'=>$request->detail,
            'disposed_to' => $request->disposed_to,
            
        ]);
        return response()->json(['message'=>'Inserted', 'code'=>200]);
    }

    public function update(Request $request)
    {
        $item = HouseDisposition::find($request->id);
        $item->size = $request->size;
        $item->detail = $request->detail;
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }
    public function edit(Request $request)
    {
        $item = HouseDisposition::find($request->id);
        $item->size = $request->size;
        $item->detail = $request->detail;
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }
    public function destroy(Request $request)
    {
        $propertydispositiondetail = HouseDisposition::where('id', $request->id)->delete();
    }
}
