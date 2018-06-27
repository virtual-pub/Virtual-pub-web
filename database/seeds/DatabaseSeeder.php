<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(EstilosTableSeeder::class);
        $this->call(ColorsTableSeeder::class);
        $this->call(CoposTableSeeder::class);
        $this->call(CervejasTableSeeder::class);
    }
}
