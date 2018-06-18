<?php

use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert(['nome' => 'Palha', 'tonalidade' => '#F5F360', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Amarelo', 'tonalidade' => '#ECE523', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Dourado', 'tonalidade' => '#E8C219', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Âmbar', 'tonalidade' => '#DD9608', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Cobre-claro', 'tonalidade' => '#CA610E', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Cobre', 'tonalidade' => '#8D300E', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Marrom-claro', 'tonalidade' => '#8A180D', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Marrom', 'tonalidade' => '#6B120E', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Marrom-escuro', 'tonalidade' => '#5B100B', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Marrom muito escuro', 'tonalidade' => '#3E0E0C', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Preto', 'tonalidade' => '#1E0B07', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Preto opaco', 'tonalidade' => '#090909', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
    }
}
