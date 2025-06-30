<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            [
                'name' => 'українська',
                'code' => 'uk',
            ],
        ];

        foreach ($languages as $language) {
            $data = [
                'name' => $language['name'],
                'code' => $language['code'],
            ];


            Language::create($data);
        }
    }
}
