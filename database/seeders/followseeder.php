<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class followseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('follows')->insert([
            'follower_id'=>'1',
            'followee_id'=>'2',
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
            
            ]);
        //
    }
}
