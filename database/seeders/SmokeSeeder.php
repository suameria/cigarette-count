<?php

namespace Database\Seeders;

use App\Models\Brand;
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
        // 2年分ほどの履歴を作成
        $numbers = range(730, 0);
        foreach ($numbers as $number) {
            // 日付
            $date = now()->subDays($number);

            $this->store(1, $number, $date);

            // 25%の確率で別銘柄も吸う
            if (mt_rand(1, 4) === 1) {
                $this->store(2, $number, $date);
            }
        }
    }

    public function store($brandId, $number, $date)
    {
        // 今日の喫煙本数だけ0より大きい数値、過去の喫煙本数は0~10の数値
        $count = ($number === 0) ? mt_rand(1, 10) : mt_rand(0, 10);

        // 喫煙本数履歴保存
        $brand = Brand::query()->find($brandId);
        $perPrice = $brand->price / $brand->number;
        $amount = $perPrice * $count;
        Smoke::query()->create([
            'brand_id' => $brand->id,
            'user_id' => 1,
            'brand_name' => $brand->name,
            'count' => $count,
            'per_price' => $perPrice,
            'amount' => $amount,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
    }
}
