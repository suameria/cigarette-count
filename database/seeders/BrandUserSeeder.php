<?php

namespace Database\Seeders;

use App\Models\BrandUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BrandUser::query()->create([
            'brand_id' => 1,
            'user_id' => 1,
        ]);

        BrandUser::query()->create([
            'brand_id' => 2,
            'user_id' => 1,
        ]);
    }
}
