<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Daily;
use App\Models\User;
use App\Models\Role;
use App\Models\Presence;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class presenceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    
    protected $signature = 'create:presence';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $presence = Presence::whereMonth('updated_at',date('m'))->get();
        foreach($presence as $u){
            if ($u->updated_at->format('d') < date('d') ){
        $u->update([
            'alfa' => $u->alfa + 1,
        ]);
            }

       
    }
}
}

