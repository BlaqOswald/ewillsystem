<?php

namespace App\Http\Controllers;

use App\Models\LivestockDisposition;
use Illuminate\Http\Request;
use App\Models\Livestock;
use App\Http\Resources\LivestockResource;
use Auth;

class LivestockDispositionController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $livestockdispositiondetails = Livestock::where('user_id', $id)->get();
        return response()->json(['livestockdispositiondetails' =>LivestockResource::collection($livestockdispositiondetails)]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $livestockdispositiondetails = LivestockDisposition::create([
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
        $item = LivestockDisposition::find($request->id);
        $item->size = $request->size;
        $item->detail = $request->detail;
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }
    public function edit(Request $request)
    {
        $item = LivestockDisposition::find($request->id);
        $item->size = $request->size;
        $item->detail = $request->detail;
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }

    public function destroy(Request $request)
    {
        $propertydispositiondetail = LivestockDisposition::where('id', $request->id)->delete();
    }
}
