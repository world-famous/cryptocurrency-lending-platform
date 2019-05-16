<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Package;

class PackageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    
   public function index()
  	{
  		$pack = Package::first();

  		return view('admin.deposit.package', compact('pack'));
  	}

     public function update(Request $request)
       {
           $pack = Package::first();

           $this->validate($request,
               [
                   'name' => 'required',
                   'min' => 'required',
                   'max' => 'required',
                   'return' => 'required',
                   'times' => 'required',
                   'period' => 'required',
                   'fixcom' => 'required',
                   'pcncom' => 'required',
               ]);

           $pack['name'] = $request->name;
           $pack['min'] = $request->min;
           $pack['max'] = $request->max;
           $pack['ret'] = $request->return;
           $pack['times'] = $request->times;
           $pack['period'] = $request->period;
           $pack['fixcom'] = $request->fixcom;
           $pack['pcncom'] = $request->pcncom;
           $pack['total'] = $request->return*$request->times;

           $pack->save();

           return back()->with('success', 'Package Updated Successfully!');
       }

       // public function store(Request $request)
       // {
       //     $this->validate($request,
       //         [
       //             'name' => 'required',
       //             'min' => 'required',
       //             'max' => 'required',
       //             'return' => 'required',
       //             'times' => 'required',
       //             'period' => 'required',
       //         ]);

       //     $pack['name'] = $request->name;
       //     $pack['min'] = $request->min;
       //     $pack['max'] = $request->max;
       //     $pack['ret'] = $request->return;
       //     $pack['times'] = $request->times;
       //     $pack['period'] = $request->period;
       //     $pack['total'] = $request->return*$request->times;

       //     Package::create($pack);

       //     return back()->with('success', 'New Package Created Successfully!');
       // }

      

       // public function destroy(Package $package)
       // {
       //    $package->delete();

       //    return back()->with('success', 'Package Deleted Successfully!');
       // }
}
