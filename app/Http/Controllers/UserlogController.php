<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Deposit;
use App\Investment;
use App\Translog;

class UserlogController extends Controller
{
	 public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index()
    {
    	$users = User::orderBy('id', 'desc')->paginate(10);

    	return view('admin.user.users', compact('users'));
    }

    public function userSearch(Request $request)
    {
        $this->validate($request,
            [
                'search' => 'required',
            ]);

        $users = User::where('username', 'like', '%' . $request->search . '%')->orWhere('email', 'like', '%' . $request->search . '%')->orWhere('name', 'like', '%' . $request->search . '%')->get();

        return view('admin.user.search', compact('users'));

    }

    public function transLog()
    {
        $trans = Translog::orderBy('id', 'desc')->paginate(10);
        return view('admin.user.translog', compact('trans'));
    }


    public function single($id)
    {
    	$user = User::findorFail($id);
    	return view('admin.user.single', compact('user','trans', 'deposits'));
    }

    public function email($id)
    {
        $user = User::findorFail($id);
        return view('admin.user.email',compact('user'));
    }

    public function sendemail(Request $request)
    {
         $this->validate($request,
            [
                'emailto' => 'required|email',
                'reciver' => 'required',
                'subject' => 'required',
                'emailMessage' => 'required'
            ]);
         $to = $request->emailto;
         $name = $request->reciver;
         $subject = $request->subject;
         $message = $request->emailMessage;

         send_email($to, $name, $subject, $message);

        return back()->withSuccess('Mail Sent Successfuly');

    }

    public function broadcast()
    {
        return view('admin.user.broadcast');
    }

    public function broadcastemail(Request $request)
    {
        $this->validate($request,
            [
                'subject' => 'required',
                'emailMessage' => 'required'
            ]);

        $users = User::where('status', '1')->get();

        foreach ($users as $user)
        {

         $to = $user->email;
         $name = $user->name;
         $subject = $request->subject;
         $message = $request->emailMessage;

         send_email($to, $name, $subject, $message);
        }

        return back()->withSuccess('Mail Sent Successfuly');
    }

    public function blupdate(Request $request,$id)
    {
        $user = User::find($id);

         $this->validate($request,
            [
                'amount' => 'required',
            ]);

        if($request->amount <= 0)
        {
            return back()->with('alert','Amount Should be Positive Number');
            exit();
        }
        else
        {
            $opt = $request->status =="1" ?1:0 ;

             if($opt == '1')
             {
                $user['balance'] = $user['balance'] + $request->amount;
                $user->save();
                $tlog['user_id'] = $user->id;
               $tlog['trxid'] = str_random(16);
               $tlog['amount'] = $request->amount;
               $tlog['balance'] = $user->balance;
               $tlog['type'] = 1;
               $tlog['details'] = 'Balance Added By Admin';
               Translog::create($tlog);

                $msg =  $request->message;
                send_email($user->email, $user->username, 'Balance Added', $msg);
                $sms =  $request->message;
                send_sms($user->mobile, $sms);
             }
             else
             {
                $user['balance'] = $user['balance'] - $request->amount;
                $user->save();
                
                  $tlog['user_id'] = $user->id;
               $tlog['trxid'] = str_random(16);
               $tlog['amount'] = $request->amount;
               $tlog['balance'] = $user->balance;
               $tlog['type'] = 0;
               $tlog['details'] = 'Balance Substracted By Admin';
               Translog::create($tlog);


                $msg =  $request->message;
                send_email($user->email, $user->username, 'Balance Substracted', $msg);
                $sms =  $request->message;
                send_sms($user->mobile, $sms);
             }

            $user->save();
        }

        return back()->withSuccess('Balance Added Successfuly');
    }

    public function statupdate(Request $request,$id)
    {
        $user = User::find($id);

        $this->validate($request,
            [
            'name' => 'required|string|max:255',
            'wallet' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            ]);

        $user['name'] = $request->name ;
        $user['mobile'] = $request->mobile;
        $user['wallet'] = $request->wallet;
        $user['status'] = $request->status =="1" ?1:0;
        $user['emailv'] = $request->emailv =="1" ?1:0;
        $user['smsv'] = $request->smsv =="1" ?1:0;
        $user['tauth'] = $request->tauth =="1" ?1:0;

        $user->save();

        $msg =  'Your Profile Updated by Admin';
        send_email($user->email, $user->username, 'Balance Added', $msg);
        $sms =  'Your Profile Updated by Admin';
        send_sms($user->mobile, $sms);

        return back()->withSuccess('User Profile Updated Successfuly');
    }

    public function banusers()
    {
        $users = User::where('status', '0')->orderBy('id', 'desc')->paginate(10);
        return view('admin.user.banned', compact('users'));
    }

    public function lendings()
    {
        $invests = Investment::all();

        return view('admin.lends.lendings', compact('invests'));
    }

}
