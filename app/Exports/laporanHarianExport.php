<?php

namespace App\Exports;
use App\Models\User;
use App\Models\Daily;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadings;
class laporanHarianExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $tgl;
    public function __construct($tgl) 
    {
        $this->tgl = $tgl;
    }
    
    public function headings(): array
    {
        return [
            
            'User id',
            'Status',
            'waktu masuk',
            'waktu keluar',
        ];
    }

    public function collection()
    {
            // return  Daily::all();
            return  Daily::whereDate('created_at', $this->tgl)->select('user_id','status','masuk','keluar')->get();
            
       
    }
    
}
