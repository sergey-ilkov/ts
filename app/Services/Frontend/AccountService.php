<?php

namespace App\Services\Frontend;

use Exception;
use App\Models\Plan;
use App\Models\Account;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Database\Eloquent\Builder;

class AccountService
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
            'path' => storage_path('logs/auth.log'),
        ]);
    }

    public function createAccount($user)
    {

        $result = false;

        $plan = Plan::where('slug', 'basic')->where('is_active', 1)->first();

        if ($plan) {
            $account = new Account([
                'starts_at' => Carbon::now(),
                // 'ends_at' => Carbon::create('9999-12-31 23:59:59'),
            ]);
            $account->user()->associate($user);
            $account->plan()->associate($plan);


            try {
                $result = $account->save();
            } catch (Exception $ex) {
                Log::stack([$this->channel])->error('Error create account: ', ['error' => $ex->getMessage()]);
            }
        }

        return $result;
    }

    public function getProduct($user_id)
    {
        // $product = Account::
        $product = DB::table('accounts')
            ->where('user_id', $user_id)
            ->tap(function ($query) {
                $this->getQueryProduct($query);
            })
            ->select('products.id', 'products.symbol', 'products.passphrase', 'products.notification')
            ->first();

        $lifespans = DB::table('accounts')
            ->where('user_id', $user_id)
            ->tap(function ($query) {
                $this->getQueryLifespans($query);
            })
            ->select('lifespans.id', 'lifespans.ttl', 'lifespans.desc')
            ->get();

        $product->lifespans = $lifespans;

        return $product;
    }

    public function getPlan($user_id)
    {
        $plan = DB::table('accounts')
            ->where('user_id', $user_id)
            ->tap(function ($query) {
                $this->getQueryPlan($query);
            })
            // ->select('products.id', 'products.symbol', 'products.passphrase', 'products.notification')
            ->first();

        return $plan;
    }

    // ? query Builder
    public function getQueryPlan($query)
    {
        return  $query->join('plans', 'plans.id', '=', 'accounts.plan_id');
    }

    public function getQueryProduct($query)
    {
        return  $query->join('plans', 'plans.id', '=', 'accounts.plan_id')
            ->join('products', 'products.id', '=', 'plans.product_id');
    }
    public function getQueryLifespans($query)
    {
        return  $query->join('plans', 'plans.id', '=', 'accounts.plan_id')
            ->join('products', 'products.id', '=', 'plans.product_id')
            ->join('lifespan_product', 'lifespan_product.product_id', '=', 'products.id')
            ->join('lifespans', 'lifespans.id', '=', 'lifespan_product.lifespan_id');
    }
}
