<?php

namespace App\Http\Controllers;

use App\Models\VehicleDisposition;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Http\Resources\VehicleResource;
use Auth;

class VehicleDispositionController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $vehicledispositiondetails = Vehicle::where('user_id', $id)->get();
        return response()->json(['vehicledispositiondetails' =>VehicleResource::collection($vehicledispositiondetails)]);
    }

    // public function view()
    // {
    //     $id = Auth::user()->id;
    //     $vehicledispositiondetails = VehicleDisposition::where('user_id', $id)->get();
    //     return response()->json(['vehicledispositiondetails' =>VehicleResource::collection($vehicledispositiondetails)]);
    // }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $vehicledispositiondetails = VehicleDisposition::create([
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
        $item = VehicleDisposition::find($request->id);
        $item->size = $request->size;
        $item->detail = $request->detail;
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }
    public function edit(Request $request)
    {
        $item = VehicleDisposition::find($request->id);
        $item->size = $request->size;
        $item->detail = $request->detail;
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }
    public function destroy(Request $request)
    {
        $propertydispositiondetail = VehicleDisposition::where('id', $request->id)->delete();
    }
}
