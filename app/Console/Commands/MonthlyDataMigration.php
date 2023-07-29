<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use App\Notifications\NotificationBulanBaru;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\DataServiceController;

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

        try {
            Notification::route('telegram', config('services.telegram-bot-api.channel_id'))
                ->notify(new NotificationBulanBaru($con));
        } catch (Exception $e) {
            $this->error($e->getMessage());
            return;
        }

        $this->info('Data migration success!');
    }
}
