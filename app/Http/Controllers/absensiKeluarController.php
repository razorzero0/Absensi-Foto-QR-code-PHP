<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Fine;
use App\Models\Presence;
use App\Models\Daily;
use Illuminate\Support\Facades\Storage;
use App\Models\method_absensi;
class absensiKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('admin/absensi/absensiKeluar',[
            'denda' => Fine::all(),
            'kehadiran' => Presence::all(),
            'presence' => Presence::where('user_id',auth()->user()->id)->latest()->get(),
            'daily' => Daily::where('user_id',auth()->user()->id)->latest()->get(),
            'metod' =>method_absensi::find(1)
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
        Daily::find($id)->update([
            'keluar' => $request->keluar
        ]);
         
        return redirect('/konfirmasi');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
