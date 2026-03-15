<?php

namespace App\Http\Controllers;

use App\Models\Expenses;
use App\Models\PatientPayment;
use App\Models\Pharmacysalepayment;
use App\Models\PatientVisit;
use App\Models\PatientVisitDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function todays()
    {
        $business = Auth::user()->business;
        $date=date("Y-m-d");
        $visits = PatientVisit::where('business',$business)->where('status','!=',0)->where('visit_date', 'like',  $date . '%')->count();
        $payments=PatientPayment::where('business',$business)->where('status',1)->where('pay_date', $date)->sum('amount_paid');
        $pharmacy = Pharmacysalepayment::where('business',$business)->where('status','!=',0)->where('pay_date', $date)->sum('amountpaid');
        $expenses = Expenses::where('business',$business)->where('status',1)->where('expense_date', $date)->sum('amount');
        return response()->json(['visits'=>$visits,'payments'=>$payments,'pharmacy'=>$pharmacy,'expenses'=>$expenses]);
    }

    public function filtered(Request $request)
    {
        $business = Auth::user()->business;
        $date_from=$request->date_from;
        $date_to=$request->date_to;
        $visits = PatientVisit::where('business',$business)->where('status','!=',0)->where('visit_date', '>=',  $date_from)->where('visit_date', '<=',  $date_to)->count();
        $payments=PatientPayment::where('business',$business)->where('status',1)->where('pay_date', '>=',  $date_from)->where('pay_date', '<=',  $date_to)->sum('amount_paid');
        $pharmacy = Pharmacysalepayment::where('business',$business)->where('status','!=',0)->where('pay_date', '>=',  $date_from)->where('pay_date', '<=',  $date_to)->sum('amountpaid');
        $expenses = Expenses::where('business',$business)->where('status','!=',0)->where('expense_date', '>=',  $date_from)->where('expense_date', '<=',  $date_to)->sum('amount');
        return response()->json(['visits'=>$visits,'payments'=>$payments,'pharmacy'=>$pharmacy,'expenses'=>$expenses]);
    }
  
    public function yearly()
    {
        $business = Auth::user()->business;
        $month = date('Y-m');
        $visits = PatientVisit::selectRaw('monthname(created_at) as month, count(*) as amount')->where('business',$business)->where('status','!=',0)->groupBy('month')->orderByRaw('min(created_at) desc')->limit(12)->get();
        $pharmacy = Pharmacysalepayment::selectRaw('monthname(created_at) as month, sum(amountpaid) as amount')->where('business',$business)->where('status','!=',0)->groupBy('month')->orderByRaw('min(created_at) desc')->limit(12)->get();
        $payments = PatientPayment::selectRaw('monthname(created_at) as month, sum(amount_paid) as amount')->where('business',$business)->where('status','!=',0)->groupBy('month')->orderByRaw('min(created_at) desc')->limit(12)->get();
        $expenses = Expenses::selectRaw('monthname(created_at) as month, sum(amount) as amount')->where('business',$business)->where('status','!=',0)->groupBy('month')->orderByRaw('min(created_at) desc')->limit(12)->get();
        $services = PatientVisitDetails::where('patient_visit_details.status','!=', 0)->where('patient_visit_details.created_at', 'LIKE', "{$month}%")->where('patient_visit_details.business',$business)->leftJoin('services', 'services.id', '=', 'patient_visit_details.service_name')->select('services.name', DB::raw('COUNT(patient_visit_details.service_name) as count'))->groupBy('services.name')->orderBy('count', 'DESC')->limit('10')->get();;
        return response()->json(['visits'=> $visits,'payments'=>$payments,'pharmacy'=> $pharmacy,'expenses'=> $expenses,'services'=> $services]);
    }
}
