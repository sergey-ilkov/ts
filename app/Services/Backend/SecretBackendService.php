<?php

namespace App\Services\Backend;

use App\Models\Secret;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class SecretBackendService
{
    /**
     * Create a new class instance.
     */
    protected $channel;
    public function __construct()
    {
        //
        $this->channel = Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/backend/secret.log'),
        ]);
    }

    public function deleteSecretsExpiredData()
    {
        // 
        $secrets = Secret::where('deleted_at', '<', Carbon::now())->delete();

        // dump($secrets);
    }
}
