<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Payment;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $payment = Payment::create([
            'user_id'=>Auth::user()->id,
            'amount_paid'=>$request->amount,
            'transaction_id'=>$request->transaction_id,
           
        ]);

        $user = User::find(Auth::user()->id);
        $user->paystatus = 1;
        $user->save();

        $user = User::where('id', Auth::user()->id)->first();
        $response = ['user' => new UserResource($user)];
        return response($response, 200);
    }

}
