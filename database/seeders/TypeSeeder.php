<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create(["name"=>"Electronics"]);
        Type::create(["name"=>"Clothing"]);
        Type::create(["name"=>"Furniture"]);
        Type::create(["name"=>"Sports"]);
        Type::create(["name"=>"Games"]);
        Type::create(["name"=>"Books"]);
    }
}
