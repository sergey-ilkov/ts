<?php

namespace App\Services\Backend;

use Exception;
use App\Models\Plan;
use App\Models\Account;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;

class AccountBackendService
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
            'path' => storage_path('logs/backend/account.log'),
        ]);
    }

    public function setDefaultAccount($user)
    {
        $plan = Plan::where('slug', 'basic')->where('is_active', 1)->first();

        if ($user && $plan) {
            $account = $user->account;
            $account->plan()->associate($plan);
            $account->starts_at = Carbon::now();
            // $account->ends_at = Carbon::create('9999-12-31 23:59:59');
            try {
                $account->update();
            } catch (Exception $ex) {
                Log::stack([$this->channel])->error('Error default account: ', ['error' => $ex->getMessage()]);
            }
        }
    }

    public function setPremiumAccount($user, $plan)
    {
        if ($user && $plan) {
            $account = $user->account;
            $account->plan()->associate($plan);
            $account->starts_at = Carbon::now();
            $account->ends_at = Carbon::now()->addMonths($plan->paid_period);
            try {
                $account->update();
            } catch (Exception $ex) {
                Log::stack([$this->channel])->error('Error set Premium account: ', ['error' => $ex->getMessage()]);
            }
        }
    }

    public function changeAccountsExpiredDate()
    {
        // ? logic check account premium plan expiration
        // ? logic check account premium plan expiration
        // ? logic check account premium plan expiration
        $plan = Plan::where('slug', 'basic')->where('is_active', 1)->first();
        // ? test
        // ? test
        // ? test
        // ? test
        // if ($plan) {
        //     $accounts = Account::where('ends_at', '<', Carbon::now())
        //         ->update([
        //             'plan_id' => $plan->id,
        //             'starts_at' => Carbon::now(),
        //             'ends_at' => null,
        //         ]);
        //     dump($accounts);
        //     return;
        // }
        // ? test
        // ? test
        // ? test
        $accounts = Account::where('ends_at', '<', Carbon::now())->get();
        // dump($accounts);
        if ($plan && !$accounts->isEmpty()) {

            foreach ($accounts as $account) {
                $account->plan()->associate($plan);
                $account->starts_at = Carbon::now();
                $account->ends_at = null;

                try {
                    $account->update();
                } catch (Exception $ex) {
                    Log::stack([$this->channel])->error('Error default account: ', ['error' => $ex->getMessage()]);
                }
            }
        }

        // dump($accounts);
    }
}
