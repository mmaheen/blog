<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use File;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $files = File::files(public_path('uploads/photo')); // Get all files in the public directory
        $randomFile = $files[array_rand($files)]; // Select a random file

        $filename = $randomFile->getFilename();

        $faker=Factory::create();
        foreach(range(1,10) as $index){
            Post::create([
                 'name'=>$faker->realText($maxNbChars=20,$indexSize=2),
                 'description'=>$faker->realText($maxNbChars = 200, $indexSize = 2),
                 'photo'=>$filename
                 
            ]);
        }
    }
}
