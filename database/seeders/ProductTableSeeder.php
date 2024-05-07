<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $condition = ['Baru', 'Bekas'];
        for ($i = 0; $i < 12; $i++) {
            # code...
            DB::table('products')->insert([
                'name' => 'product' . $i,
                'price' => rand(1000, 100000),
                'stock' => rand(1, 100),
                'weight' => rand(1, 10),
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSAWeLoRDEBMenITuWXOlT2XTtZE6HRv4_gu2SwmVnW8UWxtrTL7FxAdLNZCr32miPO1R8&usqp=CAU',
                'condition' => $condition[rand(0, 1)],
                'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis quia eum provident!
                Nobis, dolorum odio aut veniam veritatis quidem eum inventore commodi fuga
                voluptatibus quae, vel dolorem dolor pariatur reiciendis?',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
