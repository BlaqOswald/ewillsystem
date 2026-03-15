<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Faq;
use App\Models\KnowledgeBase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        $totalfaq = Faq::count();
        $totalbase = KnowledgeBase::count();
        $activeusers = User::where("status", 1)->count();
        // $completedWillsCount = User::withCount(['rchildren', 'rburialdetails','rwitnesses'])
        // ->where('paystatus', true)
        // ->count();
        $completedWillsCount = User::withCount(["rchildren", "rburialdetails"])
            ->where("paystatus", true)
            ->count();
        $totalmale = User::where("gender", "male")->count();
        $totalfemale = User::where("gender", "female")->count();
        $totalothergender = User::where("gender", "other gender")->count();
        $paystatus = User::where("paystatus", 1);
        $paymentsperstatus = User::where("status", ">", 0)
            ->select(
                DB::raw(
                    "CASE WHEN `paystatus` = 1 THEN 'PAID' WHEN `paystatus` = 0 THEN 'NOT PAID' ELSE 'Error' END AS `paystatus` ,count(*) as payments"
                )
            )
            ->groupBy("paystatus")
            ->limit(3)
            ->get();
        $userbygender = User::where("status", ">", 0)
            ->select(
                DB::raw(
                    "CASE WHEN `gender` = 'female' THEN 'Female' WHEN `gender` = 'male' THEN 'Male' ELSE 'other gender' END AS `gender` ,count(*) as count"
                )
            )
            ->groupBy("gender")
            ->limit(3)
            ->get();

        return view("home", [
            "totalfaq" => $totalfaq,
            "totalbase" => $totalbase,
            "activeusers" => $activeusers,
            "completedWillsCount" => $completedWillsCount,
            "totalmale" => $totalmale,
            "totalfemale" => $totalfemale,
            "userbygender" => $userbygender,
            "paymentsperstatus" => $paymentsperstatus,
        ]);
    }
}
