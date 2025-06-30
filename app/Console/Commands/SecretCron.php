<?php

namespace App\Console\Commands;

use App\Services\Backend\SecretBackendService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SecretCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete-secret:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete a secrets that has expired';

    /**
     * Execute the console command.
     */
    public function handle(SecretBackendService $secretBackendService)
    {
        //
        $channel = Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/cron/secret.log'),
        ]);

        Log::stack([$channel])->info('Cron Job Delete Secrets running start');
        $secretBackendService->deleteSecretsExpiredData();
    }
}