<?php

use Illuminate\Database\Seeder;

class CoposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('copos')->insert(['nome' => 'Pilsner']);
        DB::table('copos')->insert(['nome' => 'Lager']);
        DB::table('copos')->insert(['nome' => 'Caldereta']);
        DB::table('copos')->insert(['nome' => 'Pint']);
        DB::table('copos')->insert(['nome' => 'Weizen']);
        DB::table('copos')->insert(['nome' => 'Tulipa']);
        DB::table('copos')->insert(['nome' => 'Cálice']);
        DB::table('copos')->insert(['nome' => 'Flauta']);
        DB::table('copos')->insert(['nome' => 'Caneca']);
        DB::table('copos')->insert(['nome' => 'Mass']);
        DB::table('copos')->insert(['nome' => 'Tumbler']);
        DB::table('copos')->insert(['nome' => 'Cilíndrico']);
        DB::table('copos')->insert(['nome' => 'Americano']);
        DB::table('copos')->insert(['nome' => 'Pokal']);
        DB::table('copos')->insert(['nome' => 'Thistle']);
    }
}
