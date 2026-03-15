<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\License;
use App\Models\Payment_method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    public function index()
    {
      return view('businesses.index');
    }
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'name'=>'required',
                'location'=>'required',
                'telephone'=>'required',
                'email'=>'required'
            ]);
            
            $Business = Business::create([
                'name'=>$request->name,
                'location'=>$request->location,
                'telephone'=>$request->telephone,
                'email'=>$request->email,
                'addedby'=>Auth::id()
            ]);

            $startdate = date("Y-m-d");
            $enddate = date('Y-m-d', strtotime("+30 days"));
            $license = License::create([
                'business'=>$Business->id,
                'startdate'=>$startdate,
                'enddate'=>$enddate,
            ]);

            $paymentmode = Payment_method::create([
                'business'=>$Business->id,
                'name'=>'Cash',
                'set_default'=>'1',
                'addedby'=>Auth::id()
            ]);
            
            return response($Business);
            }
    }
    public function show(Business $Business)
    {
        return view('businesses.show', ['businesses'=>Business::orderBy('id', 'DESC')->get()]);
    }
    public function update(Request $request, Business $Business)
    {
        if ($request->ajax()) {
            $Business =Business:: find($request->id);
            $Business->update([
                'name'=>$request->name,
                'location'=>$request->location,
                'telephone'=>$request->telephone,
                'email'=>$request->email,
            ]);
            return response($Business);
        }
    }
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $Business =Business:: find($request->id);
            $Business->update(['status'=>0]);
            return response($Business);
        }
    }

    public function activate(Request $request)
    {
        if ($request->ajax()) {
            $Business =Business:: find($request->id);
            $Business->update(['status'=>1]);
            return response($Business);
        }
    }

    public function profile(Business $Business)
    {
        $business = Auth::user()->business;
        $profile=Business::where('status','1')->where('id',$business)->orderBy('id','DESC')->get();
        return response(['profile'=>$profile]);
    }

    public function updateprofile(Request $request){
        $business = Auth::user()->business;
        if ($request->logo) {
            $logoName = $business.''.time().'.'.$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('logos'), $logoName);
            $logolabel = $request->logo->getClientOriginalName();
            $item =Business:: find($business);
            $item->update(['logo'=>$logoName ]);
        }
        return response(['message'=>'Profile Updated']);
    }
}
