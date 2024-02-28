<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        $i = 0;
        while ($i<=10) {

            Book::create([
                'title' => substr($faker->realText(20), 0, -1),
                'ISBN' => $faker->regexify('[A-Z]{1}[a-z]{1}[-][0-9]{4}'),
                'pages' => rand(50, 600),
                'short_description' => preg_replace('[^A-Za-z0-9\-]', '', $faker->realText(180)),
                'author_id' => rand(1, 10),
            ]);
            $i++;
        }
}
}
