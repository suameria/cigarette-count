<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            User::query()->create([
                'name' => "Test User{$i}",
                'email' => "test{$i}@test.com",
                'password' => Hash::make('test9999'),
            ]);
        }
    }
}
