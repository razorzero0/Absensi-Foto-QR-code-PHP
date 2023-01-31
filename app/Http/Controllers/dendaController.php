<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fine;
class dendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('admin/denda/index',[
            'dan' => Fine::all()
        ]);
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
        $result = preg_replace("/[^0-9]/","",$request->jumlah_denda);
        Fine::create([
            'nama' => $request->nama,
            'jumlah_denda' => $result
        ]);
        return redirect('/denda');
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
    public function update(Request $request, Fine $fine)
    {
        Fine::find('id',$fine->id)->update([
            'nama' => $request->nama,
            'jumlah_denda' => $request->jumlah_denda
        ]);
        return view('/denda')->with('succes','berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fine::destroy($id);
         return redirect('/denda')->with('succes','berhasil update');
    }
}
