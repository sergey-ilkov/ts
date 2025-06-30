<?php

namespace Database\Seeders;

use App\Models\Lifespan;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $product1 = Product::create([
            'name' => 'anonymous product',
            'slug' => 'anonymous',
            'symbol' => 500,
            'passphrase' => false,
            'notification' => false,
        ]);
        $lifespan = Lifespan::find(8);
        $product1->lifespans()->attach($lifespan);

        $product2 = Product::create([
            'name' => 'basic product',
            'slug' => 'basic',
            'symbol' => 1000,
            'passphrase' => false,
            'notification' => false,
        ]);
        $lifespan = Lifespan::all();
        $product2->lifespans()->attach($lifespan);

        $product3 = Product::create([
            'name' => 'premium product',
            'slug' => 'premium',
            'symbol' => 10000,
            'passphrase' => true,
            'notification' => true,
        ]);
        $lifespan = Lifespan::all();
        $product3->lifespans()->attach($lifespan);
    }
}