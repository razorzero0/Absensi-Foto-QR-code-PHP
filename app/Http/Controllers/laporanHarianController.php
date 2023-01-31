<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Exports\laporanHarianExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Daily;
use App\Models\Role;
use App\Models\User;
use App\Models\Presence;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class laporanHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->filter){
            $a = Daily::whereDate('created_at', date($request->filter))->latest()->get();
        }else{
            $a = DB::table('dailies')->
            join('users','dailies.user_id', '=','users.id' )->get();
        }
        return view('admin/laporan/laporan-harian',[
            'daily' => $a,
            'user' => User::all(),
            'filter' => $request->filter
        ]);
        
    }

    public function export(Request $request) 
    {
        

        return Excel::download(new laporanHarianExport($request->tgl), 'laporan-harian '.$request->tgl.'.xlsx');
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
        //
    }
}
