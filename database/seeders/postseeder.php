<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use DateTime;

class postseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('posts')->insert([
            'user_id'=>'1',
            'cotent'=>'おはようございます',
            'image'=> Str::random(15),
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
            
            
            ]);
        
        
        //
    }
}
