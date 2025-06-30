<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $product = Product::find(1);
        $plan = new Plan([
            'name' => 'Anonymous',
            'slug' => 'anonymous',
            'is_active' => true,
            'price' => 0,
            'currency' => 'грн',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'paid_period' => 0,
            'paid_interval' => 'month',
            'sort_order' => 1,
        ]);
        $product->plans()->save($plan);

        $product = Product::find(2);
        $plan = new Plan([
            'name' => 'Basic',
            'slug' => 'basic',
            'is_active' => true,
            'price' => 0,
            'currency' => 'грн',
            'trial_period' => 0,
            'trial_interval' => 'day',
            'paid_period' => 0,
            'paid_interval' => 'month',
            'sort_order' => 2,
        ]);
        $product->plans()->save($plan);

        // $product = Product::find(3);
        // $plan = new Plan([
        //     'name' => 'Premium',
        //     'slug' => 'premium-month',
        //     'is_active' => true,
        //     'price' => 0,
        //     'currency' => 'грн',
        //     'trial_period' => 14,
        //     'trial_interval' => 'day',
        //     'paid_period' => 1,
        //     'paid_interval' => 'month',
        //     'sort_order' => 3,
        // ]);
        // $product->plans()->save($plan);

        // $plan = new Plan([
        //     'name' => 'Premium',
        //     'slug' => 'premium-year',
        //     'is_active' => true,
        //     'price' => 0,
        //     'currency' => 'грн',
        //     'trial_period' => 14,
        //     'trial_interval' => 'day',
        //     'paid_period' => 12,
        //     'paid_interval' => 'month',
        //     'sort_order' => 3,
        // ]);
        // $product->plans()->save($plan);
    }
}
