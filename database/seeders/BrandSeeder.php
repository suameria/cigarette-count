<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::query()->create([
            'user_id' => 1,
            'name' => 'SENTIA for IQOS ILUMA ICY PURPLE',
            'price' => 530,
            'number' => 20,
        ]);

        Brand::query()->create([
            'user_id' => 1,
            'name' => 'SENTIA for IQOS ILUMA TROPICAL YELLOW',
            'price' => 530,
            'number' => 20,
        ]);

        Brand::query()->create([
            'user_id' => 1,
            'name' => 'TEREA for IQOS ILUMA BLACK PURPLE MENTHOL',
            'price' => 580,
            'number' => 20,
        ]);

        Brand::query()->create([
            'user_id' => 1,
            'name' => 'TEREA for IQOS ILUMA TROPICAL MENTHOL',
            'price' => 580,
            'number' => 20,
        ]);

        Brand::query()->create([
            'user_id' => 1,
            'name' => 'TEREA for IQOS ILUMA BLACK RUBY REGULAR',
            'price' => 580,
            'number' => 20,
        ]);
    }
}
