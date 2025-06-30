<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


// ? Delete a secrets that has expired
// Schedule::command('delete-secret:cron')->everyMinute();
Schedule::command('delete-secret:cron')->daily();

// ? Reload app keys
Schedule::command('reload-keys:cron')->everyMinute();
// Schedule::command('reload-keys:cron')->monthly();