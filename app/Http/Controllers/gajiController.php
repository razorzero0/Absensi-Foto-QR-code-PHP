<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fine;
use App\Models\Salary;
use App\Models\Role;
use App\Models\User;
use App\Models\Presence;
use Pdf;
use Illuminate\Support\Facades\DB;
use App\Exports\laporanGajiExport;
use Maatwebsite\Excel\Facades\Excel;
class gajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('admin/gaji/index',[
            'salary' => DB::table('salaries')
            ->join('users','salaries.user_id','=','users.id')->get(),
            'user' => User::all(),
            'role' => Role::all(),
            'denda' => Fine::all(),
            'presence' => Presence::all()
        ]);
    }
    public function index1()
    {
        
        return view('admin/laporan/laporan-gaji',[
            'salary' => DB::table('salaries')
            ->join('users','salaries.user_id','=','users.id')->get(),
            'user' => User::all(),
            'role' => Role::all(),
            'denda' => Fine::all(),
            'presence' => Presence::all()
        ]);
    }
    public function createPdf()
    {
        
            
        $data = [
            'user' => User::all(),
            'role' => Role::all(),
            'denda' => Fine::all(),
            'presence' => Presence::all()
        ];

    $pdf = Pdf::loadView('/admin/gaji/gaji-pdf',$data);
    return $pdf->stream();
    }

    public function export() 
    {

        return Excel::download(new laporanGajiExport(), 'Rekap gaji pegawai.xlsx');
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
