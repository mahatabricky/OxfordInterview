<?php

namespace App\Http\Controllers;

use App\Buyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class BuyerController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers = Buyer::all();
        return view('buyer.index',compact('buyers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buyers = Buyer::all();
        return view('buyer.index',compact('buyers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name' => 'required|min:5',
            'description' => 'required',
        ]);
        
        $buyerCreate = Buyer::create([
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
        ]);
        if(!empty($buyerCreate)){
            $request->session()->flash('success', 'Successfully Added new buyer');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buyer = Buyer::findOrFail($id);
        return view('buyer.edit',compact('buyer'));


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
            'name' => 'required|min:5',
            'description' => 'required',
        ]);

        $userData = $request->all();
        
        $brand = Buyer::where('id','=',$id)->first();

        $result = $brand->update($userData);

        if($result){
            Session::flash('success','Buyer has been updated successfully');
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
        $singleBuyer = Buyer::findOrFail($id);
        $singleBuyer->delete();
        
        if($singleBuyer){
           //  $this->session()->flash('danger-del', 'Successfully deleted buyer');
             Session::flash('danger-del', 'Successfully deleted buyer');
             return redirect()->back();
           // Session::get()
        }
    }
}
