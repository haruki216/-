<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class replyseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('replies')->insert([
          'post_id'=>'1',
           'user_id'=>'1',
           'content'=>'This is body',
           'created_at'=>new DateTime(),
           'updated_at'=>new DateTime(),
          
          ]);
        //
    }
}
