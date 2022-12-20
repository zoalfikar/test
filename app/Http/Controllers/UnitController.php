<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::all();
        foreach ($units as $unit)
        {
            echo $unit->name." : ".$unit->modifier."<br/><br/>" ;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("createUnit");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Unit::create($request->all());
        return "inserted correctlly";

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        echo $unit->name." : ".$unit->modifier."<br/><br/>" ;        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view("createUnit")->with(["unit"=>$unit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $updatedUnit = Unit::find($unit->id);
        $updatedUnit->name = $request->name;
        $updatedUnit->modifier = $request->modifier;
        $updatedUnit->save();
        return "unit updated successfully" ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit=Unit::find($unit->id);
        $unit->delete();
        return "unit deleted successfully" ;

    }
}
