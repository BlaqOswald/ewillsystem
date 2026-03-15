<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuditResource;
use App\Models\Audit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $audits = Audit::orderBy("id", "DESC")->get();
        return response()->json([
            "audits" => AuditResource::collection($audits),
            "code" => 200,
        ]);
    }

    public function view()
    {
        return view("audits.index");
    }

    public function show()
    {
        return view("audits.show", [
            "audits" => Audit::orderBy("id", "DESC")->limit("200")->get(),
        ]);
    }

    public function filteredAudits(Request $request)
    {
        $startDate = $request->input("start_date");
        $endDate = $request->input("end_date");

        // Validate the dates
        if (!$startDate || !$endDate) {
            return response()->json(["message" => "Invalid date range."], 400);
        }

        // Retrieve filtered data
        $audits = Audit::whereBetween("created_at", [$startDate, $endDate])
            ->orderBy("created_at", "desc")
            ->get();

        // Return a partial view with filtered results
        return view("audits.filter", compact("audits"))->render();
    }

    public function reportworkloadbyuser(Request $request)
    {
        $business = Auth::user()->business;
        $users = User::where("business", $business)
            ->where("status", 1)
            ->orderBy("id", "DESC")
            ->get();
        $workloads = [];
        foreach ($users as $key => $user) {
            $workload = Audit::where("user", $user->id)->count();
            $r = [
                "user" => $user->full_name,
                "contact" => $user->contact,
                "workload" => $workload,
            ];
            array_push($workloads, $r);
        }
        return response(["workloads" => $workloads]);
    }

    public function filterreportworkloadbyuser(Request $request)
    {
        $business = Auth::user()->business;
        $date_from = $request->datefrom;
        $date_to = $request->dateto;
        $users = User::where("business", $business)
            ->where("status", 1)
            ->orderBy("id", "DESC")
            ->get();
        $workloads = [];
        foreach ($users as $key => $user) {
            $workload = Audit::where("user", $user->id)
                ->whereBetween(DB::raw("DATE(addedon)"), [$date_from, $date_to])
                ->count();
            $r = [
                "user" => $user->full_name,
                "contact" => $user->contact,
                "workload" => $workload,
            ];
            array_push($workloads, $r);
        }
        return response(["workloads" => $workloads]);
    }
}
