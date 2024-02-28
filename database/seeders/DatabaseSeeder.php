<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
             User::create([
                'name' => 'Zivile',
                'email' => 'zivile.vibre@gmail.com',
                'password' => Hash::make('123'),
            ]);


            $this->call([
                // UserSeeder::class,
                AuthorSeeder::class,
                BookSeeder::class,

            ]);








    }
}
