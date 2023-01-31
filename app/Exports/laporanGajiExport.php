<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Daily;
use App\Models\Fine;
use App\Models\Presence;
use Maatwebsite\Excel\Concerns\WithHeadings;

class laporanGajiExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
  
    
    public function headings(): array
    {
        return [
            
            'nama','jabatan','gaji pokok','potongan','total'
        ];
    }
    public function collection()
    {
      
       return DB::table('salaries')
       ->join('users','salaries.user_id','=','users.id')
       ->select('users.nama','salaries.jabatan','salaries.gaji_pokok','salaries.potongan','total')
       ->get();
    }
}
