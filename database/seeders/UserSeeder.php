<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name'=> 'John Doe',
                'password' => bcrypt('userdemo01'),
                'email' => "userdemo@gmail.com"
            ]
        );  
        
        User::create(
            [
                'name'=> 'Jane Smith',
                'password' => bcrypt('JaneSmith'),
                'email' => "janesmith@gmail.com"
            ]
        );  

        User::create(
            [
                'name'=> 'David Johnson',
                'password' => bcrypt('davidjohnson'),
                'email' => "davidjohnson@gmail.com"
            ]
        );  

        User::create(
            [
                'name'=> 'Michael Brown',
                'password' => bcrypt('michaelbrown'),
                'email' => "michaelbrown@gmail.com"
            ]
        );  
    }
}
