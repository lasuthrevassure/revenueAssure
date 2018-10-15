<?php

use Illuminate\Database\Seeder;

use App\Signature;

class SignatureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Signature::truncate();

       $faker = \Faker\Factory::create();

       // And now, let's create a few articles in our database:
       for ($i = 0; $i < 8; $i++) {
           Signature::create([
               'user_id' => $i+1,
               'owner_firstname' => $faker->firstNameMale,
               'owner_lastname' => $faker->lastName,
               'owner_phone' => $faker->phoneNumber ,
               'owner_email' => $faker->unique()->safeEmail,
               'owner_role' => $faker->randomElement(array ('nurse','doctor')),
               'signature' => ($i+1) . ".jpg"
           ]);
       }
    }
}
