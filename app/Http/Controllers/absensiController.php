<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fine;
use App\Models\Presence;
use App\Models\Daily;
use App\Models\Role;
use App\Models\User;
use App\Models\Salary;
use App\Models\method_absensi;
use Illuminate\Support\Facades\Storage;
class absensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin/absensi/absensi',[
            // 'denda' => Fine::all(),
            'kehadiran' => Presence::all(),
            'presence' => Presence::where('user_id',auth()->user()->id)->latest()->get(),
            'metod' => method_absensi::find(1)
        ]);
    }

    public function qr(Request $request)
    {
        
    
        if(User::find($request->result)){
            $a = User::find($request->result);
        return redirect('list-member')->with('succes','berhasil absen, '.$a->nama);
        }else{
            return redirect('list-member')->with('failed','gagal absen, coba lagi!!');
        }
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
        
        if($request->hadir){
        $hadir = $request->hadir;
        }else{
            $hadir = 0;
        }

        if($request->sakit){
        $sakit = $request->sakit;
        }else{
            $sakit = 0;
        }

        $a = User::find($request->user_id)->get();
        $b = Role::find($a->role_id)->get();
       
        Presence::create([
            'hadir' => $hadir,
            'sakit' => $sakit,
            'user_id' => $request->user_id,
            'jabatan' => $b->nama_jabatan
        ]);
        
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
        
        
        $presence = Presence::find($id);
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
           
            $batas = method_absensi::find(1);
            $currentTime = strtotime($request->alfa);
            $startTime = strtotime($batas['batas_akhir']);
            if($currentTime < $startTime ){
                $alfa = 0;
                }else{
                    $alfa = 1;
                    $hadir = 0;
                }
                $a = User::find($request->user_id);
                $b = Role::find($a->role_id);
                
            if($request->tgl == 1){
                Presence::Create([
                    'hadir' => $hadir,
                    'alfa' => $alfa,
                    'sakit' => $sakit,
                    'user_id' => $request->user_id,
                    'bulan' => $request->bulan,
                    'jabatan' => $b->nama_jabatan
                    
                ]);
            }else{
                Presence::find($id)->update([
                    'hadir' => $presence->hadir + $hadir,
                    'alfa' => $presence->alfa + $alfa,
                    'sakit' => $presence->sakit + $sakit,
                    'user_id' => $request->user_id,
                    
                ]); 
                // $s = Presence::find($id);
                // $f = Fine::all();
                // $g = Salary::where('user_id',$request->user_id)->get();
                // Salary::where('user_id',$request->user_id)
                // ->update([
                //     'potongan' => $s->alfa*$f[0]->jumlah_denda,
                //     'total' =>$g[0]->gaji_pokok - $s->alfa*$f[0]->jumlah_denda
                // ]);

                
            }
            

    if($request->hadir){
    $request->validate([
        'image' => 'required'
    ]);
    };
        if($request->image) {  
        $img = $request->image;
        $folderPath = "daily/";

        

        $image_parts = explode(";base64,", $img);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        

        $image_base64 = base64_decode($image_parts[1]);

        $fileName = uniqid() . '.png';

        

        $file = $folderPath . $fileName;
        Storage::put($file, $image_base64);
        }else{
            // $request->validate([
            //     'image' => 'required'
            // ]);
            $fileName = NULL;
        }
       

        
          
        $currentTime = strtotime($request->alfa);
      
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
                'absen_image' => $fileName,
                'nama' => $request->nama,
                'keluar' => null,
                'masuk' => $request->alfa
                
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
        
    }
}
