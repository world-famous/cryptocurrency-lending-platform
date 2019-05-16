<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deposit;
use App\User;
use App\Gateway;
use App\Translog;
use Auth;
use App\Lib\coinPayments;

class PaymentController extends Controller
{
    
    public function depconfirm(Request $request)
	{
		$this->validate($request,
        [
            'amount' => 'required',
        ]);

	    $user = User::find(Auth::id());

		if ($request->amount <= 0) 
		{
			 return back()->with('alert', 'Invalid Amount');
		}
		else
		{
			$method = Gateway::find(5);

	// You need to set a callback URL if you want the IPN to work
			$callbackUrl = route('ipn.coinPay');

// Create an instance of the class
			$CP = new coinPayments();

// Set the merchant ID and secret key (can be found in account settings on CoinPayments.net)
			$CP->setMerchantId($method->val1);
			$CP->setSecretKey($method->val2);

// Create a payment button with item name, currency, cost, custom variable, and the callback URL
			
			$bcoin = $request->amount;
			$ntrc = str_random(16);

			$depo['user_id'] = Auth::id();
			$depo['amount'] = $bcoin;
			$depo['status'] = 0;
			$depo['trxid'] = $ntrc;
			Deposit::create($depo);

			$form = $CP->createPayment('User Deposit', 'btc',  $bcoin, $ntrc, $callbackUrl);

			return view('user.deposit.preview', compact('bcoin','form'));
		} 

	}


	public function ipncoin(Request $request)
	{
		$track = $request->custom;
		$status = $request->status;
		$amount1 = floatval($request->amount1);
		$currency1 = $request->currency1;

		$DepositData = Deposit::where('trxid', $track)->first();


		if ($currency1 == "btc" && $amount1 >= $DepositData->amount && $DepositData->status == '0') {

			if ($status>=100 || $status==2) 
			{

				$user = User::find(Auth::id());
				$user['balance'] =  $user['balance'] + $DepositData->amount;
				$user->save();

			   $tlog['user_id'] = $user->id;
	           $tlog['trxid'] = str_random(16);
	           $tlog['amount'] = $DepositData->amount;
	           $tlog['balance'] = $user->balance;
	           $tlog['type'] = 1;
	           $tlog['details'] = 'Deposit Successfull';
	           Translog::create($tlog);

				$DepositData['status'] = 1;
				$DepositData->save();
			}

		}

	}

}
