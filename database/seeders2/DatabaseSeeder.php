<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
 
            DB::table('users')->insert([
                'name' => 'Zivile',
                'email' => 'zivile.vibre@gmail.com',
                'password' => Hash::make('123'),
            ]);

        foreach(range(1, 10) as $run) {
            DB::table('authors')->insert([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'portret' => rand(0, 4) ? $faker->imageUrl(150, 200) : null,

            ]);
        }

        foreach(range(1, 20) as $run) {
            DB::table('books')->insert([
                'title' => substr($faker->realText(20), 0, -1),
                'ISBN' => $faker->regexify('[A-Z]{1}[a-z]{1}[-][0-9]{4}'),
                'pages' => rand(50, 600),
                'short_description' => preg_replace('[^A-Za-z0-9\-]', '', $faker->realText(180)),
                'author_id' => rand(1, 10),
 
            ]);
        }

        
    



    }
}
