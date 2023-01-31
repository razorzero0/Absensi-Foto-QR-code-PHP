<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Presence;
use App\Models\User;
use App\Models\Role;
use App\Models\Daily;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Console\Commands\DailyCommand;
class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
            $schedule->command('create:database')->everyMinute();
            $schedule->command('create:presence')->dailyAt('18:00');;
            // $schedule->command(DailyCommand::class)->everyMinute();
    }


    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
