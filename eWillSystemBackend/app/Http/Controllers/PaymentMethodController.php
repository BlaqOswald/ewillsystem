<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentOptionResource;
use App\Models\Audit;
use App\Models\Business;
use App\Models\ExpensePayment;
use App\Models\Expenses;
use App\Models\PatientPayment;
use App\Models\PatientSaving;
use App\Models\Payment_method;
use App\Models\Pharmacysalepayment;
use App\Models\Purchase;
use App\Models\Purchasepayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business = Auth::user()->business;
        $methods=Payment_method::where('status','=','1')->where('business',$business)->orderBy('id', 'DESC')->get();
        return response([
            'methods'=> PaymentOptionResource::collection($methods),
        ]);
    }
    public function store(Request $request)
    {
        $business = Auth::user()->business;
        $addedby = Auth::user()->id;
        $check =  Payment_method::where('name',$request->name)->where('account_number',$request->account_number)->where('business',$business)->first();
        if($check){
            return response()->json(['message'=>'Payment Option Already Exists', 'code'=>200]);
        } 
        else{
        $user = Payment_method::create([
            'business'=>$business,
            'name'=>$request->name,
            'account_number'=>$request->account_number,
            'current_balance'=>$request->current_balance ?? '0',
            'addedby'=>$addedby,
        ]);
        $audit = Audit::create([
            'business'=>Auth::user()->business, 'addedon'=>date('Y-m-d'), 'user'=>Auth::user()->id,
             'activity'=>'Added a New Payment Option : '.$request->name.' - '.$request->account_number,
        ]);
        return response()->json(['message'=>'Inserted', 'code'=>200]);
        }
    }
    public function defaultas(Request $request)
    {
        $business = Auth::user()->business;
        $addedby = Auth::user()->id;
        $check =  Payment_method::where('set_default',1)->where('status',1)->where('business',$business)->first();
        if($check){
            $item = Payment_method::find($check->id);
            $item->set_default = 0;
            $item->save();

            $item1 = Payment_method::find($request->id);
            $item1->set_default = 1;
            $item1->save();
            $method=Payment_method::where('id',$request->id)->first();
            $audit = Audit::create([
                'business'=>Auth::user()->business, 'addedon'=>date('Y-m-d'), 'user'=>Auth::user()->id,
                 'activity'=>'Set '.$method->name.' - '.$method->account_number.' as the Default Payment Option',
            ]);
        } 
        else{
            $item = Payment_method::find($request->id);
            $item->set_default = 1;
            $item->save();
            $method=Payment_method::where('id',$request->id)->first();
            $audit = Audit::create([
                'business'=>Auth::user()->business, 'addedon'=>date('Y-m-d'), 'user'=>Auth::user()->id,
                 'activity'=>'Set '.$method->name.' - '.$method->account_number.' as the Default Payment Option',
            ]);
        }
    }

    public function update(Request $request)
    {
        $item = Payment_method::find($request->id);
        $item->name = $request->name;
        $item->account_number = $request->account_number;
        $item->save();
        $audit = Audit::create([
            'business'=>Auth::user()->business, 'addedon'=>date('Y-m-d'), 'user'=>Auth::user()->id,
             'activity'=>'Update a Payment Option : '.$request->name.' - '.$request->account_number,
        ]);
    }

    public function destroy(Request $request)
    {
        $item = Payment_method::find($request->id);
        $item->status = '0';
        $item->save();
        $method=Payment_method::where('id',$request->id)->first();
        $audit = Audit::create([
            'business'=>Auth::user()->business, 'addedon'=>date('Y-m-d'), 'user'=>Auth::user()->id,
             'activity'=>'Deleted a Payment Option : '.$method->name.' - '.$method->account_number,
        ]);
    }

    public function reportcashflows(Request $request)
    {
        $business = Auth::user()->business;
        $methods=Payment_method::where('business', $business)->where('status', 1)->orderBy('id','DESC')->get();
        $cashflows = [];
        foreach ($methods as $key => $method) {
            $services=PatientPayment::where('payment_option',$method->id)->where('status',1)->sum('amount_paid');
            $savings=PatientSaving::where('paymentoption',$method->id)->where('status',1)->sum('saving');
            $purchases=Purchasepayment::where('paymentoption',$method->id)->where('status',1)->sum('amountpaid');
            $pharmacy=Pharmacysalepayment::where('paymentoption',$method->id)->where('status',1)->sum('amountpaid');
            $expenses=ExpensePayment::where('paymentoption',$method->id)->where('status',1)->sum('amountpaid');
            $r=['method'=>$method->name,'account_number'=>$method->account_number,'services'=>$services,'savings'=>$savings,'purchase'=>$purchases,'pharmacy'=>$pharmacy,'expenses'=>$expenses,'balance'=>($services+$savings+$pharmacy)-($purchases+$expenses),];
            array_push($cashflows,$r);
        }
        return response(['cashflows'=>$cashflows]);
    }

    public function filterreportcashflows(Request $request)
    {
        $date_from=$request->datefrom;
        $date_to=$request->dateto;
        $business = Auth::user()->business;
        $methods=Payment_method::where('business', $business)->where('status', 1)->orderBy('id','DESC')->get();
        $cashflows = [];
        foreach ($methods as $key => $method) {
            $services=PatientPayment::where('payment_option',$method->id)->where('status',1)->whereBetween(DB::raw('DATE(created_at)'), array($date_from, $date_to))->sum('amount_paid');
            $savings=PatientSaving::where('paymentoption',$method->id)->where('status',1)->whereBetween(DB::raw('DATE(created_at)'), array($date_from, $date_to))->sum('saving');
            $purchases=Purchasepayment::where('paymentoption',$method->id)->where('status',1)->whereBetween(DB::raw('DATE(created_at)'), array($date_from, $date_to))->sum('amountpaid');
            $pharmacy=Pharmacysalepayment::where('paymentoption',$method->id)->where('status',1)->whereBetween(DB::raw('DATE(created_at)'), array($date_from, $date_to))->sum('amountpaid');
            $expenses=ExpensePayment::where('paymentoption',$method->id)->where('status',1)->whereBetween(DB::raw('DATE(created_at)'), array($date_from, $date_to))->sum('amountpaid');
            $r=['method'=>$method->name,'account_number'=>$method->account_number,'services'=>$services,'savings'=>$savings,'purchase'=>$purchases,'pharmacy'=>$pharmacy,'expenses'=>$expenses,'balance'=>($services+$savings+$pharmacy)-($purchases+$expenses),];
            array_push($cashflows,$r);
        }
        return response(['cashflows'=>$cashflows]);
    }
}
