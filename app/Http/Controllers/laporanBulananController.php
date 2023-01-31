<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Daily;
use App\Models\Role;
use App\Models\User;
use App\Models\Presence;
use App\Exports\laporanBulananExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
class laporanBulananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $t = $request->tahun;
        if($request->bulan && $t){
            $a = Daily::whereMonth('created_at', $request->bulan)->
            whereYear('created_at', $t)
            ->latest()->get();
        }else{
            $a = DB::table('dailies')->
            join('users','dailies.user_id', '=','users.id' )->get();
        }


        
        return view('admin/laporan/laporan-bulanan',[
            'daily' => $a,
            'user' => User::all(),
            'bulan' => $request->bulan,
            'tahun' => $t
        ]);
    }

    public function index1(Request $request)
    {
        
        if($request->bulan && $request->tahun){
            $a = DB::table('presences')
            ->join('users', 'presences.user_id', '=', 'users.id')
            ->whereMonth('presences.created_at', $request->bulan)
            ->whereYear('presences.created_at',$request->tahun)
            ->get();
        }else{
        $a = DB::table('presences')
            ->join('users', 'presences.user_id', '=', 'users.id')
            ->whereMonth('presences.created_at', date('m'))
            ->whereYear('presences.created_at',date('Y'))
            ->get();
        }

        if($request->bulan && $request->tahun){
            $b = DB::table('presences')
            ->join('users', 'presences.user_id', '=', 'users.id')
            ->whereMonth('presences.created_at', $request->bulan)
            ->whereYear('presences.created_at',$request->tahun)
            ->select('users.id','presences.hadir','presences.sakit','presences.alfa')->get()
            ;
        }else{
        $b = DB::table('presences')
            ->join('users', 'presences.user_id', '=', 'users.id')->get();
        }



        return view('admin/laporan/rekap',[
            'kehadiran' => $b,
            'user' => User::all(),
            'jabatan' => Role::all(),
            'a' => $a,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun

            // 'role' => DB::table('roles')->
            // join('presences','roles.id','=','presence.role_id')->get()
        ]);
    }

    public function export(Request $request) 
    {
        $b = $request->bulan;
        $t = $request->tahun;

        return Excel::download(new laporanBulananExport($b,$t), 'Rekap absensi bulanan '.$b.'-'.$t.'.xlsx');
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
