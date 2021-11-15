<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) {
            $cName = 'Компания '.$i;
            $companies[] = [
                'name' => $cName,
                'email' => Str::random(10).'@gmail.com',
                'phone' => Str::random(10),
                'website' => Str::random(10),
                // 'logo' => Str::random(10).'.jpg',
            ];
        }
    \DB::table('companies')->insert($companies);
    }
}