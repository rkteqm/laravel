<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use Faker\Factory as faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        // for ($i = 0; $i < 100; $i++) {
            $customer = new Customer;
            $customer->profile_pic = '1681713692.jpg';
            $customer->name = $faker->name;
            $customer->email = $faker->email;
            $customer->gender = 'M';
            $customer->dob = $faker->date;
            $customer->address = $faker->address;
            $customer->city = $faker->city;
            $customer->state = $faker->state;
            $customer->country = $faker->country;
            $customer->password = md5($faker->password);
            $customer->save();
        // }
    }
}
