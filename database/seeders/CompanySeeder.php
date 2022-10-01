<?php

namespace Database\Seeders;

use App\Models\company_details;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        company_details::create([
            'companyName'=>'BD-Engineering Inventory',
            'companyEmail'=>'bd-eng@gmail.com',
            'phone'=>'01741589652',
            'address'=>'Dhaka, Uttara',
            'logo'=>'logo.png',
        ]);
    }
}
