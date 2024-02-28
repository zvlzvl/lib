<?php

namespace Database\Seeders;

use App\Models\Author;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
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
                Author::create([
                'name' => $faker->firstName,
                'surname' => $faker->lastName,
                'portret' => rand(0, 4) ? $faker->imageUrl(150, 200) : null,
                ]);
                ++$i;
        }

    }
}
