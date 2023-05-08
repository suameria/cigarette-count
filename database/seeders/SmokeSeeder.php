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
        // 2年分ほどの履歴を作成
        $numbers = range(730, 0);
        foreach ($numbers as $number) {
            // 日付
            $date = now()->subDays($number);
            // 今日の喫煙本数だけ0より大きい数値、過去の喫煙本数は0~20の数値
            $count = ($number === 0) ? mt_rand(1, 20) : mt_rand(0, 20);
            // 喫煙本数履歴保存
            Smoke::query()->create([
                'brand_id' => 1,
                'user_id' => 1,
                'count' => $count,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}
