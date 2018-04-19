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
        DB::table('estilos')->insert(['nome' => 'American Light Lager']);
        DB::table('estilos')->insert(['nome' => 'American Lager']);
        DB::table('estilos')->insert(['nome' => 'Cream Ale']);
        DB::table('estilos')->insert(['nome' => 'American Wheat Beer']);
        DB::table('estilos')->insert(['nome' => 'International Pale Lager']);
        DB::table('estilos')->insert(['nome' => 'International Amber Lager']);
        DB::table('estilos')->insert(['nome' => 'International Dark Lager']);
        DB::table('estilos')->insert(['nome' => 'Czech Pale Lager']);
        DB::table('estilos')->insert(['nome' => 'Czech Premium Pale Lager']);
        DB::table('estilos')->insert(['nome' => 'Czech Amber Lager']);
        DB::table('estilos')->insert(['nome' => 'Czech Dark Lager']);
        DB::table('estilos')->insert(['nome' => 'Munich Helles']);
        DB::table('estilos')->insert(['nome' => 'Festbier']);
        DB::table('estilos')->insert(['nome' => 'Helles Bock']);
        DB::table('estilos')->insert(['nome' => 'German Leichtbier']);

        
           
    }
}
