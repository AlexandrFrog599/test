<?php

 use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@local.in',
            'password' => bcrypt('password'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $this->call(CompaniesTableSeeder::class);

		$faker = Faker::create('ru_RU');
        for ($i=0; $i < 100 ; $i++) {
            $employees[] = [
	            'company_id' => rand(1,10),
	            'first_name' => $faker->firstName,
	            'last_name' => $faker->lastName,
	            'email' => $faker->email,
	            'phone' => $faker->phoneNumber,            	
            ];
        }
        DB::table('employees')->insert($employees);
   	}
}
