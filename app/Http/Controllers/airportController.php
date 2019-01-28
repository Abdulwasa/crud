<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\airport;
use App\Http\Requests\airportRegeust;
use DB;

class airportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $airports = airport::all();
      return view('airports.index')->with('airports', $airports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('airports.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(airportRegeust $request)
    {
      airport::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $airport = airport::find($id);
     return view('airports.update')->with('airport', $airport);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $airport = airport::findOrFail($id);
          return view('airports.update')->with('airport', $airport);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(airportRegeust $request, airport $airport)
    {
      $airport->update($request->all());

      /*Session::flash('umessage', 'Data updated successfully!');*/
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
        $finder = DB::table('airports')->where('id',$id)->delete();
        return redirect()->back();
    }
}
