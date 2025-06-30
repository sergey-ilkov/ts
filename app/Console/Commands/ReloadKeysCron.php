<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;

class ReloadKeysCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reload-keys:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reload app keys.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $channel = Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/cron/keys.log'),
        ]);

        Log::stack([$channel])->info('Cron Job Reload keys running start');

        $app_previous_keys = env('APP_PREVIOUS_KEYS');
        $app_key = env('APP_KEY');

        file_put_contents(app()->environmentFilePath(), str_replace(
            'APP_PREVIOUS_KEYS' . '=' . $app_previous_keys,
            'APP_PREVIOUS_KEYS' . '=' . $app_key,
            // 'APP_PREVIOUS_KEYS' . '=' . env('APP_PREVIOUS_KEYS'),
            // 'APP_PREVIOUS_KEYS' . '=' . env('APP_KEY'),
            file_get_contents(app()->environmentFilePath())
        ));


        Artisan::call('key:generate');
    }
}