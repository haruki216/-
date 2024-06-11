<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'田中太郎',
            'email'=>'abc@email.com',
            'password'=>Hash::make('12345'),
            'birthday'=>'0401',
            'phone_number'=>'0120123123',
            'height'=>'170',
            'age'=>'20',
            'gender'=>'男性',
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
            
            ]);
        
    
      DB::table('users')->insert([
            'name'=>'佐藤太郎',
            'email'=>'def@email.com',
            'password'=>Hash::make('67890'),
            'birthday'=>'0501',
            'phone_number'=>'0120123123',
            'height'=>'170',
            'age'=>'20',
            'gender'=>'男性',
            'created_at'=>new DateTime(),
            'updated_at'=>new DateTime(),
            
            ]);
    }
    
}
