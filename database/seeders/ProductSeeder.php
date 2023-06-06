<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create(
            [
                'name'=> 'TechMaster X1',
                'description' => "The TechMaster X1 is a cutting-edge gadget that combines the latest technology with sleek design. With advanced features and seamless connectivity, it revolutionizes the way you interact with your digital world.",
                'price' => 150.99,
                'type_id'=>1,
                'user_id'=>1,
                'photo_id'=>1
            ]
        ); 

        Product::create(
            [
                'name'=> 'TrendSetter T-Shirt',
                'description' => "The TrendSetter T-Shirt is a fashion-forward garment designed to make a statement. Made from high-quality fabric, it offers comfort and style in one package. Express your unique personality with this trendy piece.",
                'price' => 150.99,
                'type_id'=>2,
                'user_id'=>1,
                'photo_id'=>1
            ]
        ); 

        Product::create(
            [
                'name'=> 'ComfortZone Recliner',
                'description' => "The ComfortZone Recliner is the epitome of relaxation. Crafted with plush cushioning and ergonomic design, it provides ultimate comfort and support. Sit back, unwind, and indulge in luxury with this exquisite recliner.",
                'price' => 150.99,
                'type_id'=>3,
                'user_id'=>1,
                'photo_id'=>1
            ]
        ); 

        Product::create(
            [
                'name'=> 'TurboCharge Running Shoes',
                'description' => "The TurboCharge Running Shoes are engineered for speed and performance. With lightweight materials and responsive cushioning, they provide enhanced agility and comfort. Boost your running game with these dynamic shoes.",
                'price' => 150.99,
                'type_id'=> 4,
                'user_id'=>1,
                'photo_id'=>1
            ]
        ); 


        Product::create(
            [
                'name'=> 'MindMasters: Unlocking Your Potential',
                'description' => " MindMasters: Unlocking Your Potential is a transformative book that delves into the power of the mind. Packed with practical exercises and inspiring insights, it guides you on a journey of self-discovery and personal growth.",
                'price' => 150.99,
                'type_id'=>6,
                'user_id'=>1,
                'photo_id'=>1
            ]
        ); 

        Product::create(
            [
                'name'=> 'BattleQuest: Legends of Valor',
                'description' => "Embark on an epic adventure with BattleQuest: Legends of Valor. This immersive role-playing game takes you to a fantastical realm filled with mythical creatures and perilous quests. Unleash your strategic skills, defeat formidable enemies, and become a legendary hero in this captivating gaming experience.",
                'price' => 150.99,
                'type_id'=>5,
                'user_id'=>1,
                'photo_id'=>1
            ]
        ); 
    }
}
