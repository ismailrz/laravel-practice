<?php

namespace App\Http\Controllers;

use App\text;
use Illuminate\Http\Request;

class TextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $Student = new Text;

      $Student ->Name = $request->Name;
      $Student ->Department = $request->Department;
      $Student ->Age = $request->Age;
      $Student ->Address = $request->Address;

      $Student->save();
      return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\text  $text
     * @return \Illuminate\Http\Response
     */
    public function show(text $text)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\text  $text
     * @return \Illuminate\Http\Response
     */
    public function edit(text $text)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\text  $text
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, text $text)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\text  $text
     * @return \Illuminate\Http\Response
     */
    public function destroy(text $text)
    {
        //
    }
}
