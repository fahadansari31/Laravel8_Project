<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Registration;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=1; $i<=5; $i++){
        $customer = new Registration;
        $customer->name = $faker->name;
        $customer->email = $faker->email;
        $customer->password = md5($faker->password);
        $customer->save();
        }
    }
}
