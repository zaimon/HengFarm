<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $faker = Faker::create();
    	foreach (range(1,120) as $index) {
	        DB::table('projects')->insert([
	            'name' => $faker->name,
	            'startDate' => '01/12/2016',
	            'expireDate' => '30/01/2017',
	            'type' => $faker->numberBetween(1,3),
	            'status' => 1
	        ]);
        }
        foreach (range(1,10) as $index) {
            DB::table('processes')->insert([
                'name' => $faker->name,
                'projects_id' => 1,
                'startDate' => '01/12/2016',
                'expireDate' => '30/01/2017',
                'cost' => $faker->numberBetween(1000,3000),
                'status' => 1
            ]);
        }
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => bcrypt('123456789'),
            'email' => 'admin@mail.com',
            'firstName' => 'Heng',
            'lastName' => 'Kaidum',
            'logo' => 'admin.jpg',
            'gender' => 1,
            'status' => 1,
            'rank' => 99
        ]);
    }
}
