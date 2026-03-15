<?php

namespace App\Http\Controllers;

use App\Models\KnowledgeBase;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Audit;
use Illuminate\Support\Facades\Auth;

class KnowledgeBaseController extends Controller
{
    public function view()
    {
        $knowledgebases = KnowledgeBase::where("status", 1)->get();
        return response()->json(["knowledgebases" => $knowledgebases]);
    }

    public function index()
    {
        return view("knowledgebases.index");
    }

    public function show(KnowledgeBase $knowledgeBase)
    {
        return view("knowledgebases.show", [
            "knowledgebases" => KnowledgeBase::orderBy("id", "DESC")->get(),
        ]);
    }

    public function update(Request $request, KnowledgeBase $knowledgeBase)
    {
        if ($request->ajax()) {
            $knowledgeBase = KnowledgeBase::find($request->id);
            $knowledgeBase->update([
                "title" => $request->title,
                "description" => $request->description,
            ]);
            return response($knowledgeBase);
        }
        // Get the authenticated user
        $user = Auth::user();
        // Audit Log
        Audit::create([
            "activity" => "Edited knowledgebase",
            "addedon" => now(),
            "user" => $user->id,
        ]);
    }

    public function store(Request $request)
    {
        $knowledgebase = KnowledgeBase::create([
            "title" => $request->title,
            "description" => $request->description,
            "banner" => $request->banner,
        ]);
        return response()->json(["message" => "Inserted", "code" => 200]);

        // Get the authenticated user
        $user = Auth::user();
        // Audit Log
        Audit::create([
            "activity" => "Added knowledgebase",
            "addedon" => now(),
            "user" => $user->id,
        ]);
    }

    public function destroy(Request $request)
    {
        $knowledgebase = KnowledgeBase::where("id", $request->id)->delete();

        // Get the authenticated user
        $user = Auth::user();
        // Audit Log
        Audit::create([
            "activity" => "Destroyed knowledgebase",
            "addedon" => now(),
            "user" => $user->id,
        ]);
    }
}
