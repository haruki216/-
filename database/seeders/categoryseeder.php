<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
        'name'=>'腹筋',
        //
    ]);
    
    
        DB::table('categories')->insert([
        'name'=>'背中',
        //
    ]);
    
    
    }
}
