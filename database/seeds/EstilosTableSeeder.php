<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstilosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estilos')->insert(['nome' => 'American Light Lager', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('estilos')->insert(['nome' => 'American Lager', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('estilos')->insert(['nome' => 'American Pale Ale', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('estilos')->insert(['nome' => 'American Indian Pale Ale', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('estilos')->insert(['nome' => 'Cream Ale', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('estilos')->insert(['nome' => 'American Wheat Beer', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('estilos')->insert(['nome' => 'International Pale Lager', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('estilos')->insert(['nome' => 'International Amber Lager', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('estilos')->insert(['nome' => 'International Dark Lager', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('estilos')->insert(['nome' => 'Czech Pale Lager', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('estilos')->insert(['nome' => 'Czech Premium Pale Lager', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('estilos')->insert(['nome' => 'Czech Amber Lager', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('estilos')->insert(['nome' => 'Czech Dark Lager', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('estilos')->insert(['nome' => 'Munich Helles', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('estilos')->insert(['nome' => 'Festbier', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('estilos')->insert(['nome' => 'Helles Bock', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('estilos')->insert(['nome' => 'German Leichtbier', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('estilos')->insert(['nome' => 'Weissbier', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        
           
    }
}
