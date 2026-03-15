<?php

namespace App\Http\Controllers;

use App\Models\BankaccountDisposition;
use Illuminate\Http\Request;
use App\Models\BankAccount;
use App\Http\Resources\BankaccountResource;
use Auth;

class BankaccountDispositionController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $bankaccountpositiondetails = BankAccount::where('user_id', $id)->get();
        return response()->json(['bankaccountdispositiondetails' =>BankaccountResource::collection($bankaccountpositiondetails)]);
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $bankaccountdispositiondetails = BankaccountDisposition::create([
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
        $item = BankaccountDisposition::find($request->id);
        $item->size = $request->size;
        $item->detail = $request->detail;
        $item->disposed_to = $request->disposed_to;
        $item->save();
    }

    public function destroy(Request $request)
    {
        $bankaccount = BankaccountDisposition::where('id', $request->id)->delete();
    }
}
