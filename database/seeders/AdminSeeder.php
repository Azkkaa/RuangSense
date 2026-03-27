<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'AdminRuangSense',
            'email' => 'admin@ruangsense.com',
            'is_admin' => true,
            'password' => Hash::make('admin6969')
        ]);
    }
}
