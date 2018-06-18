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
        DB::table('copos')->insert(['nome' => 'Pilsner', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('copos')->insert(['nome' => 'Lager', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('copos')->insert(['nome' => 'Caldereta', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('copos')->insert(['nome' => 'Pint', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('copos')->insert(['nome' => 'Weizen', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('copos')->insert(['nome' => 'Tulipa', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('copos')->insert(['nome' => 'Cálice', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('copos')->insert(['nome' => 'Flauta', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('copos')->insert(['nome' => 'Caneca', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('copos')->insert(['nome' => 'Mass', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('copos')->insert(['nome' => 'Tumbler', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('copos')->insert(['nome' => 'Cilíndrico', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('copos')->insert(['nome' => 'Americano', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('copos')->insert(['nome' => 'Pokal', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('copos')->insert(['nome' => 'Thistle', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
    }
}
