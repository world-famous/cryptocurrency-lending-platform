<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Investment;
use App\Package;
use Carbon\Carbon;
use App\Returnlog;
use App\Translog;
use App\User;
use Auth;

class InvestmentController extends Controller
{
   public function investcoin()
   {
        $pack = Package::first();

        $active = Investment::where('user_id', Auth::id())->where('status', 1)->first();

        if ($active == null) 
        {
            return view('user.lend.lend' , compact('pack'));
        }
        else
        {
            return back()->with('alert', 'You Have an Active Lending');
        }

        
   }

 public function investview(Request $request)
    {
        $this->validate($request,
            [
                'amount' => 'required',
            ]);

        $pack = Package::first();

        $user = User::find(Auth::id());

        if ($request->amount <= 0 || $request->amount > $user->balance || $request->amount > $pack->max || $request->amount < $pack->min)
         {
             return back()->with('alert', 'Invalid Amount');
         }
         else
         {
            $amount = $request->amount;
            $every = ($amount*$pack->ret)/100;
            $total = $every*$pack->times;

            return view('user.lend.invpreview', compact('total','every','amount','pack'));
        }
    }

    public function investconfirm(Request $request)
     {
        $this->validate($request,
            [
                'amount' => 'required',
            ]);
        $user = User::find(Auth::id());
        $pack = Package::first();

        if ($request->amount <= 0 || $request->amount > $user->balance || $request->amount > $pack->max || $request->amount < $pack->min)
         {
             return back()->with('alert', 'Invalid Amount');
         }
         else
         {

            $user['balance'] = $user->balance - $request->amount;
            $user->save();

            $tlog['user_id'] = $user->id;
           $tlog['trxid'] = str_random(16);
           $tlog['amount'] = $request->amount;
           $tlog['balance'] = $user->balance;
           $tlog['type'] = 0;
           $tlog['details'] = 'Lending';
           Translog::create($tlog);

            $invest['user_id'] = Auth::id();
            $invest['package_id'] =1;
            $invest['amount'] = $request->amount;
            $invest['rtime'] = '0';
            $invest['returned'] = '0';
            $invest['next'] = Carbon::parse()->addHours($pack->period);
            $invest['status'] = 1;
            Investment::create($invest);

            return redirect()->route('my.invest')->with('success', 'Lending Successfull');
         }
     }


    public function myInvest()
    {
      $myinvests = Investment::where('user_id', Auth::id())->get();

      return view('user.lend.myinvest', compact('myinvests','returns'));
    }

    public function returnlog()
    {
        $rlogs = Returnlog::where('user_id', Auth::id())->get();

        return view('user.lend.retur', compact('rlogs'));
    }
}
