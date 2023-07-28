<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('payment_types')->insert([
            'id' => 1,
            'name' => 'CREDIT_CARD'
        ]);
        DB::table('payment_types')->insert([
            'id' => 2,
            'name' => 'VIRTUAL_ACCOUNT'
        ]);
        DB::table('payment_types')->insert([
            'id' => 3,
            'name' => 'BANK_TRANSFER'
        ]);
        DB::table('payment_types')->insert([
            'id' => 4,
            'name' => 'E_WALLET'
        ]);


    }
}
