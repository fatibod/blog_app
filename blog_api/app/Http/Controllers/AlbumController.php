<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $albums = Album::all();
        return view('album.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('album.create');
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
        $album = new Album();
        $album->name = $request->input('albumName');
        $album->description = $request->input('albumArtista');
        $album->type = $request->input('albumGenero');
        if($album->save()){
            return redirect()->back()->with('success', 'Saved succesfully!');
        }
        return redirect()->back()->with('success', 'Could not save!');
    }

    /**
     * Display the specified resource.
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function show(Album $album)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $album = Album::find($id);
        return view("album.edit", compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $album = Album::find($id);
        $album->name = $request->input('albumName');
        $album->description = $request->input('albumArtista');
        $album->type = $request->input('albumGenero');
        if($album->save()){
            return redirect()->back()->with('success', 'Updated succesfully!');
        }
        return redirect()->back()->with('success', 'Could not update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Album  $album
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(Album::destroy($id)){
            return redirect()->back()->with('deleted', 'Deleted succesfully!');
        }
        return redirect()->back()->with('delete-failed', 'Could not delete!');
    }
}
