<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Daily;
use App\Models\Presence;
use Maatwebsite\Excel\Concerns\WithHeadings;
class laporanBulananExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $bulan;
    private $tahun;
    private $a;
    public function __construct($bulan,$tahun) 
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
        $this->a = 2000;
    }
    
    public function headings(): array
    {
        return [
            
            'user_id','nama','jabatan','hadir','sakit','alfa'
        ];
    }

    public function collection()
    {
            // return  Daily::all();
            return  DB::table('presences')
            ->join('users', 'presences.user_id', '=', 'users.id')
            ->whereMonth('presences.created_at', $this->bulan)
            ->whereYear('presences.created_at',$this->tahun)
            ->select('users.id','users.nama','presences.jabatan','presences.hadir','presences.sakit','presences.alfa')->get();
            
       
    }
}
