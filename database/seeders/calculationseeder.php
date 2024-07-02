<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use DateTime;

class CalculationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('calculations')->insert([
            'user_id'=>'1',
             'weight'=>'74.2',
              'date'=>Carbon::create(2024, 5, 30),
              'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
        
        ]);
        //
    }
}
