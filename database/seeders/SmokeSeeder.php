<?php

namespace Database\Seeders;

use App\Models\Smoke;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SmokeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Smoke::query()->create([
            'brand_id' => 1,
            'user_id' => 1,
            'count' => 8,
        ]);
    }
}
