<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\User;
use App\Models\Audit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function view()
    {
        $faqs = Faq::where("status", 1)->get();
        return response()->json(["faqs" => $faqs]);
    }

    public function index()
    {
        return view("faqs.index");
    }

    public function store(Request $request)
    {
        $faq = Faq::create([
            "title" => $request->title,
            "description" => $request->description,
        ]);
        // Get the authenticated user
        $user = Auth::user();
        // Audit Log
        Audit::create([
            "activity" => "created a faq",
            "addedon" => now(),
            "user" => $user->id,
        ]);
        return response()->json(["message" => "Inserted", "code" => 200]);
    }

    public function show(Faq $faq)
    {
        return view("faqs.show", ["faqs" => Faq::orderBy("id", "DESC")->get()]);
    }
    public function update(Request $request, Faq $faq)
    {
        if ($request->ajax()) {
            $Faq = Faq::find($request->id);
            $Faq->update([
                "title" => $request->title,
                "description" => $request->description,
            ]);
            return response($Faq);
        }
    }

    public function destroy(Request $request)
    {
        $faq = Faq::where("id", $request->id)->delete();
        // Get the authenticated user
        $user = Auth::user();
        // Audit Log
        Audit::create([
            "activity" => "Destroyed a faq",
            "addedon" => now(),
            "user" => $user->id,
        ]);
    }
}
