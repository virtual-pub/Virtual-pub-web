<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Mantenedor',
            'email' => 'mantenedor@exemplo.com',
            'password' => bcrypt('mantenedor'),
            'isMantenedor' => 1,
            'isFabricante' => 0,
            'isUser' => 0,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'Fabricante',
            'email' => 'fabricante@exemplo.com',
            'password' => bcrypt('fabricante'),
            'fabricante_name' => 'Fabricante',
            'isMantenedor' => 0,
            'isFabricante' => 1,
            'isUser' => 0,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@exemplo.com',
            'password' => bcrypt('Usuario'),
            'isMantenedor' => 0,
            'isFabricante' => 0,
            'isUser' => 1,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
        ]);
    }
}
