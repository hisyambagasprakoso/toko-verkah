<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('merchants')->insert([
            'id' => 1,
            'email' => 'admin@adidas.com',
            'password' => Hash::make('password'),
            'username' => 'adidas',
            'last_updated_by' => 'adminverxah'
        ]);
        DB::table('merchants')->insert([
            'id' => 2,
            'email' => 'admin@nike.com',
            'password' => Hash::make('password'),
            'username' => 'nike',
            'last_updated_by' => 'adminverxah'
        ]);
        DB::table('merchants')->insert([
            'id' => 3,
            'email' => 'admin@zara.com',
            'password' => Hash::make('password'),
            'username' => 'zara',
            'last_updated_by' => 'adminverxah'
        ]);
        DB::table('merchants')->insert([
            'id' => 4,
            'email' => 'admin@hnm.com',
            'password' => Hash::make('password'),
            'username' => 'hnm',
            'last_updated_by' => 'adminverxah'
        ]);
        DB::table('merchants')->insert([
            'id' => 5,
            'email' => 'admin@uniqlo.com',
            'password' => Hash::make('password'),
            'username' => 'uniqlo',
            'last_updated_by' => 'adminverxah'
        ]);

    }
}
