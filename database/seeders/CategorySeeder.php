<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

Use Faker\Factory;
use Illuminate\Support\Str;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker=Factory::create();
        foreach(range(1,50)as $index){
            $name=substr($faker->paragraph,0,40);

            Category::create([
                'name'=>$name,
                'user_id'=>rand(1,11),
                'slug'=>Str::slug($name, '-'),
                'status'=>array_rand([
                    'active'=>'active',
                    'inactive'=>'inactive',
                ])
            ]);
        }
    }
}
