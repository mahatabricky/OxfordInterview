<?php

namespace App\Http\Controllers;

use App\BankAccounts;
use App\FinancialOrganization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BankAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allAccounts = BankAccounts::all();
        return view('BankAccount.index',compact('allAccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = FinancialOrganization::all();
        return view('BankAccount.create',compact('banks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
      // return $request->all();
        $this->validate($request,[
            'account_name' => 'required',
            'financial_organization_id' => 'required',
            'account_no'    => 'required',
            'branch'        => 'required',
            'account_type'  => 'required',
            'swift_code'    => 'required',
            'route_no'      => 'required',
        ]);

        $userData = $request->all();
        $result = BankAccounts::create($userData);

        if(!empty($result)){
            $request->session()->flash('success', 'Successfully Added new Accounts');
            return redirect()->back();
        }else{
            $request->session()->flash('danger', 'Something happend bad happen,please try again later');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $single = BankAccounts::findOrFail($id);
        $banks = FinancialOrganization::all();  
        //return $single;
        return view('BankAccount.edit',compact('single','banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'account_name' => 'required',
            'financial_organization_id' => 'required',
            'account_no'    => 'required',
            'branch'        => 'required',
            'account_type'  => 'required|numeric',
            'swift_code'    => 'required',
            'route_no'      => 'required',
        ]);
        $userData = $request->all();
        $BankAccounts = BankAccounts::where('id','=',$id)->first();
        $result = $BankAccounts->update($userData);
        if($result){
            Session::flash('success','Accounts has been updated successfully');
        }else{
            Session::flash('error','Something went wrong , Please try again later');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $singleAccount = BankAccounts::findOrFail($id);
        $singleAccount->delete();
        
        if($singleAccount){
             Session::flash('danger-del', 'Successfully deleted Account');
             return redirect()->back();
             
        }
    }
}
