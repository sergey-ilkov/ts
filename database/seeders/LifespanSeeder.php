<?php

namespace Database\Seeders;

use App\Models\Lifespan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LifespanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $lifespans = [
            [
                'ttl' => 300,
                'desc' => [
                    'uk' => 'зберегти на 5 хвилин',
                ],
            ],
            [
                'ttl' => 900,
                'desc' => [
                    'uk' => 'зберегти на 15 хвилин',
                ],
            ],
            [
                'ttl' => 1800,
                'desc' => [
                    'uk' => 'зберегти на 30 хвилин',
                ],
            ],
            [
                'ttl' => 3600,
                'desc' => [
                    'uk' => 'зберегти на 1 годину',
                ],
            ],
            [
                'ttl' => 14400,
                'desc' => [
                    'uk' => 'зберегти на 4 години',
                ],
            ],
            [
                'ttl' => 43200,
                'desc' => [
                    'uk' => 'зберегти на 12 годин',
                ],
            ],
            [
                'ttl' => 86400,
                'desc' => [
                    'uk' => 'зберегти на 1 день',
                ],
            ],
            [
                'ttl' => 259200,
                'desc' => [
                    'uk' => 'зберегти на 3 дні',
                ],
            ],
            [
                'ttl' => 604800,
                'desc' => [
                    'uk' => 'зберегти на 7 днів',
                ],
            ],
            // [
            //     'ttl' => 864000,
            //     'desc' => [
            //         'uk' => 'зберегти на 10 днів',          
            //     ],
            // ],
        ];

        foreach ($lifespans as $lifespan) {
            Lifespan::create($lifespan);
        }
    }
}