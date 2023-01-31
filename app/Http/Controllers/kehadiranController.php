<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presence;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Daily;
class kehadiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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

        return view('admin/kehadiran/index',[
            'kehadiran' => Presence::all(),
            'user' => User::all(),
            'jabatan' => Role::all(),
            'a' => $a,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun

            // 'role' => DB::table('roles')->
            // join('presences','roles.id','=','presence.role_id')->get()
        ]);
    }
    public function index1(Request $request)
    {
        
        $t = $request->tahun;
        if($request->bulan && $t){
            $a = Daily::whereMonth('created_at', $request->bulan)->
            whereYear('created_at', $t)
            ->latest()->get();
        }else{
            $a = Daily::latest()->get()
            ->whereMonth('presences.created_at', date('m'))
            ->whereYear('presences.created_at',date('Y'))
            ->get();
        }


        
        return view('admin/laporan/laporan-bulanan',[
            'daily' => $a,
            'user' => User::all(),
            'bulan' => $request->bulan,
            'tahun' => $t
        ]);
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
        
        Presence::create([
            'user_id' => $request->user_id,
            'bulan' => $request->bulan
           
        ]);
        return redirect('/kehadiran');
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

        
     Presence::destroy($id);
     return redirect('/kehadiran')->with('succes','berhasil');
    }
}
