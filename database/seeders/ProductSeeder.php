<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['name'=>'Apple mobile',
            'price'=>'69000',
            'description'=>"6gb ram, 256gb rom",
            'category'=>'electronic',
            'gallery'=>'https://www.att.com/scmsassets/global/devices/phones/apple/apple-iphone-15/gallery/pink-1.jpg',],
            ['name'=>'LG mobile',
            'price'=>'12000',
            'description'=>"4gb ram, 24gb rom",
            'category'=>'electronic',
            'gallery'=>'https://www.meroshopping.com/images/lg-mobile-phone-d-855-g3.jpg',],
            ['name'=>'Retro Jersey',
            'price'=>'4500',
            'description'=>"Original Adiddas Retro Product",
            'category'=>'clothing',
            'gallery'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOi3N1VKiumvIh4XTMJ4gsGyhRzigDMz5Q6w&usqp=CAU',],

        ]);
    }
}
