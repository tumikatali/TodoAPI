<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = \Faker\Factory::create();

        $password = Hash::make('itu123');

        User::create([
            'name' => 'Itu',
            'email' => 'itu@test.com',
            'password' => $password,
        ]);

        for ($i=0; $i < 15 ; $i++) { 
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
