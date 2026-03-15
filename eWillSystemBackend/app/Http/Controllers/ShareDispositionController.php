<?php

namespace App\Http\Controllers;

use App\Models\ShareDisposition;
use Illuminate\Http\Request;
use App\Models\Share;
use App\Http\Resources\ShareResource;
use Auth;


class ShareDispositionController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $sharedispositiondetails = Share::where('user_id', $id)->get();
        return response()->json(['sharedispositiondetails' =>ShareResource::collection($sharedispositiondetails)]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $sharedispositiondetails = ShareDisposition::create([
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
        $item = ShareDisposition::find($request->id);
        $item->size = $request->size;
        $item->detail = $request->detail;
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }

    public function edit(Request $request)
    {
        $item = ShareDisposition::find($request->id);
        $item->size = $request->size;
        $item->detail = $request->detail;
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }
    public function destroy(Request $request)
    {
        $propertydispositiondetail = ShareDisposition::where('id', $request->id)->delete();
    }
}
