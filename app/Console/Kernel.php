<?php

namespace BuscaAtivaEscolar\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\ImportCitiesFromIBGE::class,
        Commands\ImportSchoolsFromINEP::class,
        Commands\RegisterSuperUser::class,
        Commands\RegisterTenant::class,
        Commands\SpawnChildAlert::class,
        Commands\InspectChild::class,
        Commands\ReindexAllChildren::class,
        Commands\ReindexAllCities::class,
        Commands\ReindexAllSchools::class,
        Commands\SnapshotDailyMetrics::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('snapshot:daily_metrics')->dailyAt('23:00');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
