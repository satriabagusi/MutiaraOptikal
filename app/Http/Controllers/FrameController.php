<?php

namespace App\Http\Controllers;

use App\Frame_brand;
use App\Frame_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrameController extends Controller
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
        if(Auth::check()){
            $brands = Frame_brand::all();
            return view('admin.add-frame', compact('brands'));
        }else{
            return redirect('/login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBrand(Request $request)
    {
        $request->validate([
            'brand' => 'required|string|'
            ]);
        
        Frame_brand::create([
            'frame_brand' => $request['brand'],
        ]);

        return redirect('admin/add-frame')->with('status', 'Berhasil Menambahkan Merk Frame !');
    }

    public function storeType(Request $request)
    {
        $request->validate([
            'frame_type' => 'required|string|unique:frame_types',
            'stock' => 'required|string',
            'price' => 'required|string',
            ]);
        
        Frame_type::create([
            'frame_type' => $request['frame_type'],
            'stock' => $request['stock'],
            'price' => str_replace(".", "", $request['price']),
            'id_brand' => $request['id_brand'],
        ]);

        return redirect('admin/add-frame')->with('status', 'Berhasil Menambahkan Type Frame !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Frame  $frame
     * @return \Illuminate\Http\Response
     */
    public function show(Frame $frame)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Frame  $frame
     * @return \Illuminate\Http\Response
     */
    public function edit(Frame $frame)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Frame  $frame
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Frame $frame)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Frame  $frame
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frame $frame)
    {
        //
    }
}
