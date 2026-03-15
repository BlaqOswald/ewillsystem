<?php

namespace App\Http\Controllers;

use App\Http\Resources\OtherPropertyResource;
use Illuminate\Http\Request;
use App\Models\PropertyDispositionDetail;
use App\Models\OtherProperty;
use Auth;

class PropertyDispositionDetailController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $propertydispositiondetails = OtherProperty::where('user_id', $id)->get();
        return response()->json(['propertydispositiondetails' =>OtherPropertyResource::collection($propertydispositiondetails)]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $propertydispositiondetails = PropertyDispositionDetail::create([
            'user_id'=>$user_id,
            'property_id'=>$request->id,
            'size'=>$request->size,
            'detail'=>$request->detail,
            'disposed_to' => $request->disposed_to,
            
        ]);
        return response()->json(['message'=>'Inserted', 'code'=>200]);
    }
    public function edit(Request $request)
    {
        $item = PropertyDispositionDetail::find($request->id);
        $item->size = $request->size;
        $item->detail = $request->detail;
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }

    public function update(Request $request)
    {
        $item = PropertyDispositionDetail::find($request->id);
        $item->size = $request->size;
        $item->detail = $request->detail;
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }

    public function destroy(Request $request)
    {
        $propertydispositiondetail = PropertyDispositionDetail::where('id', $request->id)->delete();
    }
}
