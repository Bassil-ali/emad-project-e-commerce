<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class RunQueueWorker extends Command
{
    // The name and signature of the command.
    protected $signature = 'queue:run-worker';

    // The console command description.
    protected $description = 'Run the Laravel queue worker';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // script execution in shared host environment
        //* * * * * /usr/local/bin/php /home/username/path-to-your-project/artisan queue:work --stop-when-empty --sleep=3 --tries=3 >> /dev/null 2>&1

        // Execute the php artisan queue:work command
        Artisan::call('queue:work', [
            '--tries' => 3, // Number of tries
            '--sleep' => 3, // Sleep time between failed jobs
        ]);

        // Optionally output to console that the worker is running
        $this->info('Queue worker started successfully.');
        
        return 0;
    }
}