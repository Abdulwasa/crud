<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\airline;
use App\Http\Requests\airlineRequest;
use DB;

class airlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airlines = airline::all();
       return view('airlines.index')->with('airlines', $airlines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('airlines.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(airlineRequest $request)
    {
      airline::create($request->all());
      return redirect()->route('airlines.index')->with('message', 'data added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $finder = airline::find($id);
        return view('airlines.update')->with('airline', $finder);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(airlineRequest $request, airline $airline)
    {

     $airline->update($request->all());

      Session::flash('message', 'Data updated successfully!');
      return redirect()->route('airlines.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $finder = DB::table('airlines')->where('id',$id)->delete();
        return redirect()->back();
    }
}
