<?php

namespace Database\Seeders;

use App\Models\admin\admin;
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

        $admin = admin::create([
            'name'=>'mohamed',
            'email'=>'mohamed@gmail.com',
            'password'=>Hash::make('11111111'),
            'phone'=>'1111111111'
        ]);
    }
}
