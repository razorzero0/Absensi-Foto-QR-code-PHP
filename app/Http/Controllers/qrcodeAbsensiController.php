<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Daily;
use App\Models\User;
use App\Models\Presence;
use App\Models\Salary;
use App\Models\Fine;
use App\Models\method_absensi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\RateLimiter;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class qrcodeAbsensiController extends Controller
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $uu = User::find($request->user_id);
    $d = Daily::where('user_id',$request->user_id)->get();
    $ss = count($d->all());
    if($ss > 0){
        return redirect('/absensi')->with('succes','Sudah absen '.$uu->nama);
    }
        if(User::find($request->user_id)){
        $presence = Presence::where('user_id',$request->user_id)->get();
        $id = $presence[0]->id;
       
        if($request->hadir){
            $hadir = 1;
            }else{
                $hadir = 0;
            }
    
            if($request->sakit){
            $sakit = 1;
            }else{
                $sakit = 0;
            }
           
            
            $currentTime = strtotime($request->alfa);
            $startTime = strtotime('11:00');
            if($currentTime < $startTime ){
                $alfa = 0;
                }else{
                    $alfa = 1;
                    $hadir = 0;
                }
                $a = User::find($request->user_id);
                $b = Role::find($a->role_id);
                
            if($request->tgl == 01){
                Presence::Create([
                    'hadir' => $hadir,
                    'alfa' => $alfa,
                    'sakit' => $sakit,
                    'user_id' => $request->user_id,
                    'jabatan' => $b->nama_jabatan
                    
                ]);
            }else{
                Presence::find($id)->update([
                    'hadir' => $presence[0]->hadir + $hadir,
                    'alfa' => $presence[0]->alfa + $alfa,
                    'sakit' => $presence[0]->sakit + $sakit,
                    'user_id' => $request->user_id,
                    
                ]); 
                $s = Presence::find($id);
                $f = Fine::all();
                $g = Salary::where('user_id',$request->user_id)->get();
                Salary::where('user_id',$request->user_id)
                ->update([
                    'potongan' => $s->alfa*$f[0]->jumlah_denda,
                    'total' =>$g[0]->gaji_pokok - $s->alfa*$f[0]->jumlah_denda
                ]);

                
            }
            
       
        
          
        $currentTime = strtotime($request->alfa);
        $startTime = strtotime('11:00');
        if($currentTime < $startTime && $request->alfa && $request->hadir){
            $i = 'hadir';
            }else{
                $i = 'alfa';
            }
            
           if($request->sakit){
            $i  = 'sakit';
           
           }
           $a = User::find($request->user_id);
           $b = Role::find($a->role_id);
            Daily::Create([

                'user_id' => $request->user_id,
                'jabatan' => $b->nama_jabatan,
                'status' => $i,
                'nama' => $request->nama,
                'keluar' => 0,
                'masuk' => $request->alfa
                
            ]);

            
           
        return redirect('/konfirmasi');}else{
        return redirect('/absensi')->with('failed','scan gagal');  
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function keluar(Request $request)
    {
        $uu = User::find($request->user_id);
    $d = Daily::where('user_id',$request->user_id)->get();
   
    if($d[0]->keluar !== NULL ){
        return redirect('/absensi-keluar')->with('succes','Sudah absen '.$uu->nama);
    }
        if(User::find($request->user_id)){
        Daily::where('user_id',$request->user_id)->update([
            'keluar' => $request->keluar
        ]);
        return redirect('/absensi-keluar')->with('succes','berhasil absen '.$uu->nama);
    }else{
        return redirect('/absensi-keluar')->with('failed','scan gagal');  
        }
    }
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
