<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            array(
                'name' => "Amit",
                'email' => "amit4ever@gmail.com",
                'password' => Hash::make('amit12345'),
                'type' => 2,
                'isActive' => 1
            ),
            array(
                'name' => "ishwar",
                'email' => "ishwar@gmail.com",
                'password' => Hash::make('ishwar12345'),
                'type' => 3,
                'isActive' => 3
            ),
            array(
                'name' => "Rakesh",
                'email' => "rakesh@gmail.com",
                'password' => Hash::make('rakesh12345'),
                'type' => 2,
                'isActive' => 1
            ),

            array(
            'name' => "Ajeet",
            'email' => "ajeet@gmail.com",
            'password' => Hash::make('ajeet12345'),
            'type' => 2,
            'isActive' => 1
        ), array(
            'name' => "Manikant",
            'email' => "manikant@gmail.com",
            'password' => Hash::make('manikant12345'),
            'type' => 3,
            'isActive' => 1
        ), array(
            'name' => "Ajay",
            'email' => "ajay@gmail.com",
            'password' => Hash::make('ajay12345'),
            'type' => 3,
            'isActive' => 1
        )]
        );
    }
}
