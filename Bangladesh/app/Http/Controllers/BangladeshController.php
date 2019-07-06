<?php

namespace App\Http\Controllers;

use App\Bangladesh;
use Illuminate\Http\Request;

class BangladeshController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $variable = new Bangladesh;
        $variable->fname = $request->fname;
        $variable->lname = $request->lname;
        $variable->email = $request->email;
        $variable->password = $request->password;
        $variable->mobile = $request->mobile;

        $variable->save();
        return redirect()->Route('show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bangladesh  $bangladesh
     * @return \Illuminate\Http\Response
     */
    public function show(Bangladesh $bangladesh)
    {
        $variable = Bangladesh::All();

        return view('view')->with('Ismail',$variable);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bangladesh  $bangladesh
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $variable  = Bangladesh::find($id);

        return view('edit')->with('variable',$variable);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bangladesh  $bangladesh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $variable = Bangladesh::find($id);
      $variable->fname = $request->fname;
      $variable->lname = $request->lname;
      $variable->email = $request->email;
      $variable->password = $request->password;
      $variable->mobile = $request->mobile;

      $variable->save();
      return redirect()->Route('show');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bangladesh  $bangladesh
     * @return \Illuminate\Http\Response
     */
    public function delete($bangladesh)
    {

        $variable = Bangladesh::find($bangladesh);
        $variable->delete();
        return redirect()->Route('show');
    }
}
