<?php

namespace App\Http\Controllers;

use App\Models\Thing;
use Illuminate\Http\Request;

class ThingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $things = Thing::all();
        return view('thing.index', compact('things'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('thing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $thing = new Thing();
        $thing->name = $request->input('thingName');
        if($thing->save()){
            return redirect()->back()->with('success', 'Saved succesfully!');
        }
        return redirect()->back()->with('success', 'Could not save!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Thing  $thing
     * @return \Illuminate\Http\Response
     */
    public function show(Thing $thing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Thing  $thing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $thing = Thing::find($id);
        return view("thing.edit", compact('thing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Thing  $thing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $thing = Thing::find($id);
        $thing->name = $request->input('thingName');
        if($thing->save()){
            return redirect()->back()->with('success', 'Updated succesfully!');
        }
        return redirect()->back()->with('success', 'Could not update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Thing  $thing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Thing::destroy($id)){
            return redirect()->back()->with('deleted', 'Deleted succesfully!');
        }
        return redirect()->back()->with('delete-failed', 'Could not delete!');
    }
}
