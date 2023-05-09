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
            'name' => 'SENTIA for IQOS ILUMA ICY PURPLE',
            'price' => 530,
            'number' => 20,
        ]);

        Brand::query()->create([
            'name' => 'SENTIA for IQOS ILUMA TROPICAL YELLOW',
            'price' => 530,
            'number' => 20,
        ]);
    }
}
