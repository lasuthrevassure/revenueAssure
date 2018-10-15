<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SignatureTableSeeder::class);
        Model::unguard();
         //$this->call(PermissionSeeder::class);
        Model::reguard();
    }
}
