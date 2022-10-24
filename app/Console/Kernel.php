<?php

namespace App\Console;

use App\Models\Donation;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

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
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
            DB::table('projects')->whereDate('starting_date', '<=', now())->where('status', '!=', 'completed')->update(['status' => 'in progress']);
            DB::table('projects')->whereDate('starting_date', '>', now())->update(['status' => 'active']);
        })->everyMinute();

        $schedule->call(function () {
            $donations = DB::table('projects')->join('donations', 'projects.id', '=', 'donations.project_id')->select('projects.*, donations.amount')->sum('amount');
            DB::table('projects')->where('projects.target_donations', '<=', $donations)->update(['status' => 'in progress']);
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
