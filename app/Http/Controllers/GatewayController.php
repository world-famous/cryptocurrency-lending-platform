<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gateway;

class GatewayController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function show()
        {
        	$gateways = Gateway::all();
            
            if($gateways == null)
            {
                $default=[
                    'gateimg' => 'paypal.png',
                    'name' => 'PayPal',
                    'minamo' => '100',
                    'maxamo' => '100000',
                    'charged' => '10',
                    'chargep' => '11',
                    'rate' => '21',
                    'val1' => 'JHuiqejhkjq',
                    'val2' => '24897HHd',
                    'currency' => 'USD',
                    'status' => '1'
                ];

                Gateway::create($default);
                $gateways = Gateway::all();
            }       
        	
        	return view('admin.deposit.gateway', compact('gateways'));

        }

         public function store(Request $request)
        {
            $this->validate($request, [
                'gateimg' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name' => 'required',
                'status' => 'nullable'
            ]);

            if($request->hasFile('gateimg'))
            {             
                $gateway['gateimg'] = uniqid().'.'.$request->gateimg->getClientOriginalExtension();
                $request->gateimg->move('assets/images/gateway',$gateway['gateimg']);
            }
            
            $gateway['name'] = $request->name;
            $gateway['minamo'] = '0';
            $gateway['maxamo'] = '0';
            $gateway['charged'] = '0';
            $gateway['chargep'] = '0';
            $gateway['rate'] = '0';
            $gateway['val1'] = $request->val1;
            $gateway['val2'] = $request->val2;
            $gateway['currency'] = '0';
            $gateway['status'] = $request->status =="1" ?1:0;

            Gateway::create($gateway);

            return back()->with('success','New Gateway Added successfully.');
        }

        public function update(Request $request, $id)
        {
        	$gateway = Gateway::findorFail($id);

            $this->validate($request, [
                'gateimg' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'name' => 'required',
                'val1' => 'nullable',
                'val2' => 'nullable',
                'status' => 'nullable'
            ]);

            if($request->hasFile('gateimg'))
            {
                $path = 'assets/images/gateway/'.$gateway->gateimg;

                    if(file_exists($path))
                    {
                        unlink($path);
                    }
                    
                $gateway['gateimg'] = uniqid().'.'.$request->gateimg->getClientOriginalExtension();
                $request->gateimg->move('assets/images/gateway',$gateway['gateimg']);
            }

            $gateway['name'] = $request->name;
            $gateway['minamo'] = '0';
            $gateway['maxamo'] = '0';
            $gateway['charged'] = '0';
            $gateway['chargep'] = '0';
            $gateway['rate'] = '0';
            $gateway['val1'] = $request->val1;
            $gateway['val2'] = $request->val2;
            $gateway['currency'] = '0';
            $gateway['status'] = $request->status;

            $gateway->save();

            return back()->with('success','Gateway Information Updated successfully.');
        }
}
