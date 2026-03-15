<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriesResource;
use App\Models\Audit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business = Auth::user()->business;
        $categories=Categorie::where('status','1')->where('business',$business)->orderBy('id','DESC')->get();
        return response(['categories'=>CategoriesResource::collection($categories)]);
    }

    public function withqty()
    {
        $business = Auth::user()->business;
        $categories=Categorie::where('status','1')->where('has_quantity',1)->where('business',$business)->orderBy('id','DESC')->get();
        return response([
            'categories'=>$categories,
            'code'=>200,
        ]);
    }

    public function store(Request $request)
    {
        $categories = Categorie::create([
            'business'=>Auth::user()->business,
            'name'=>$request->name,
            'has_quantity'=>$request->has_quantity ?? 0,
            'status'=>1,
            'addedon'=>date('Y-m-d'),
            'addedby'=>Auth::user()->id,
        ]);
        $audit = Audit::create([
            'business'=>Auth::user()->business, 'addedon'=>date('Y-m-d'), 'user'=>Auth::user()->id,
            'activity'=>'Added a New Product Category '.$request->name
        ]);
        return response(['categories'=>$categories]);
    }

    public function update(Request $request)
    {
        $item = Categorie::find($request->id);
        $item->name = $request->name;
        $item->save();
        $audit = Audit::create([
            'business'=>Auth::user()->business, 'addedon'=>date('Y-m-d'), 'user'=>Auth::user()->id,
            'activity'=>'Updated a Product Category '.$item->name
        ]);
    }

    public function destroy(Request  $request)
    {
        $item = Categorie::find($request->id);
        $item->status = 0;
        $item->save();
        $audit = Audit::create([
            'business'=>Auth::user()->business, 'addedon'=>date('Y-m-d'), 'user'=>Auth::user()->id,
            'activity'=>'Deleted a Product Category '.$item->name
        ]);
    }
}
