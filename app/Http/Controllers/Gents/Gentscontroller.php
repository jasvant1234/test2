<?php

namespace App\Http\Controllers\Gents;

use App\Http\Controllers\Controller;
use App\Models\All\All;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Gentscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_all_gents = All::where('gender','=','male')->get();
        return view('Gents.show_gents_clothes',compact('get_all_gents'));
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_gents = All::find($id);
        if(Storage::delete('public/vendors/dist/all/' . $delete_gents->product_image))
        {
            $delete_gents->delete();
        }
        return redirect()->back()->with(['success'=>'DATA DELETED SUCCESSFULLY']);
    }
}
