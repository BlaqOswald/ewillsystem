<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\LandResource;
use App\Models\Land;
use App\Models\LandDisposition;
use Auth;

class LandDispositionController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $landdispositiondetails = Land::where('user_id', $id)->get();
        return response()->json(['landdispositiondetails' =>LandResource::collection($landdispositiondetails)]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $landdispositiondetails = LandDisposition::create([
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
        $item = LandDisposition::find($request->id);
        $item->size = $request->size;
        $item->detail = $request->detail;
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }
    public function edit(Request $request)
    {
        $item = LandDisposition::find($request->id);
        $item->size = $request->size;
        $item->detail = $request->detail;
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }
    public function destroy(Request $request)
    {
        $propertydispositiondetail = LandDisposition::where('id', $request->id)->delete();
    }
    

    
    


}
