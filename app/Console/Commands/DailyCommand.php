<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Daily;
use App\Models\User;
use App\Models\Role;
use App\Models\Presence;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class DailyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    
    protected $signature = 'create:database';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create database Daily';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $user = User::all();
        $role = Role::all();
        foreach($user as $u){
        $i = $role->find($u->role_id);
       
        Daily::Create([

            'user_id' => $u->id,
            'jabatan' => $i->nama_jabatan,
            'status' => "belum absen masuk",
            'nama' => $u->nama,
          
            
        ]);
            }

       
    }
}

