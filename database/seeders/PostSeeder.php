<?php

namespace Database\Seeders;

use File;
use Faker\Factory;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $category = Category::select('id')->get();  
        $category_count= count($category);

        $faker=Factory::create();
        foreach(range(1,80) as $index){
            $files = File::files(public_path('uploads/photo')); // Get all files in the public directory
            $randomFile = $files[array_rand($files)]; // Select a random file
            $filename = $randomFile->getFilename(); //random file name

            Post::create([
                 'name'=>$faker->realText($maxNbChars=20,$indexSize=2),
                 'category_id'=>rand(1,$category_count),
                 'description'=>$faker->realText($maxNbChars = 10000, $indexSize = 2),
                 'photo'=>$filename
                 
            ]);
        }
    }
}
