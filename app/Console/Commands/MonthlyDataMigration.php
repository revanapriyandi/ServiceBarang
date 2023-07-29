<?php

namespace App\Console\Commands;

use App\Http\Controllers\DataServiceController;
use Illuminate\Console\Command;

class MonthlyDataMigration extends Command
{
    protected $signature = 'data:migrate';
    protected $description = 'Move data from barang_masuks to histories when a new month starts.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $con = new DataServiceController();
        $con->restartData();

        $this->info('Data migration success!');
    }
}
