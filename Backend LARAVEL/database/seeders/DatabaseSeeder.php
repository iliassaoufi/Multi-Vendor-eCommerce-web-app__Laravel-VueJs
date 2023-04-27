<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
   
        /*DB::table('stores')->insert([
            'name' => Str::random(10),
            'user_id'=>'1',
            'email' => Str::random(10).'@gmail.com',
            'description'=> Str::random(10),
            'image_profil' => Str::random(10),
             'image_coverture' => Str::random(10),
            'numero' => Str::random(10),

        ]);*/
       /* DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
             'password' => Hash::make('password'),
             'role'=>'2'

        ]);*/
      

    }
}
