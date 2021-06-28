<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;   
use Illuminate\Support\Str;




class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            DB::table('personal_details')->insert([
                'pincode'      => Str::random(6),
                'city'    => Str::random(6),
                'district'      =>Str::random(6),
                'state'    => Str::random(6),
                'country'      => Str::random(6),
            ]);
        } 
    }
}
