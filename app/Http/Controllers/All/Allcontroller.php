<?php

namespace App\Http\Controllers\All;

use App\Http\Controllers\Controller;
use App\Models\All\All;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Allcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_clothes_gets = All::get();
        return view('All.show_all_clothes',compact('all_clothes_gets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('All.add_all_clothes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'gender' => 'required',
            'category' => 'required',
            'product_image' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_size' => 'required',
            'product_descreption' => 'required',
        ]);

        $input = $request->all();


        if ($request->hasFile("product_image")) {
            $img = $request->file("product_image");
            $img->store('public/vendors/dist/all');
            $input['product_image'] = $img->hashName();
        }

        All::create($input);
        return redirect()->route('index')->with(['success'=>'DATA INSERTED SUCCESSFULLY']);
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
        $delete_all_gents = All::find($id);
        if(Storage::delete('public/vendors/dist/all/' . $delete_all_gents->product_image))
        {
             $delete_all_gents->delete();
        }
        return redirect()->route('index')->with(['unsuccess'=>'DATA DELETED SUCCESSFULLY']);

    }
}
