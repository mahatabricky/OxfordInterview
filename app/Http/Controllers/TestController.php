<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::all();
        return view('tests.index',compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tests.create');
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
            'name' => 'required|min:2',
        ]);

        $result = Test::create([
            'name' => $request->name,
            'user_id' => Auth::user()->id,
        ]);

        if($result){
            $request->session()->flash('success','success');
            return redirect()->back();
        }else{
            $request->session()->flash('danger','Something bad happen');
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
        $test = Test::where('test_id','=',$id)->first();
        return $test;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = Test::where('test_id','=',$id)->first();
        //return $test;
        return view('tests.edit',compact('test'));
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
            'name' => 'required|min:2',
        ]);
        $data = $request->all();
        $test = Test::where('test_id','=',$id)->first();
        $result = $test->update($data);
        
        if($result){
            Session::flash('upadte','Updated');
            return redirect()->route('test.index');
        }else{
            Session::flash('er','Error Updating');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = Test::where('test_id','=',$id)->first();
        $result = $test->delete();
        if($result){
            Session::flash('success-del','Deleted');
        }else{
            Session::flash('danger-del','Error Updating');
            
        }
        return redirect()->back();
    }
}
