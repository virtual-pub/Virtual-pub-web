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
        DB::table('colors')->insert(['nome' => 'Palha', 'tonalidade' => '#F5F360']);
        DB::table('colors')->insert(['nome' => 'Amarelo', 'tonalidade' => '#ECE523']);
        DB::table('colors')->insert(['nome' => 'Dourado', 'tonalidade' => '#E8C219']);
        DB::table('colors')->insert(['nome' => 'Âmbar', 'tonalidade' => '#DD9608']);
        DB::table('colors')->insert(['nome' => 'Cobre-claro', 'tonalidade' => '#CA610E']);
        DB::table('colors')->insert(['nome' => 'Cobre', 'tonalidade' => '#8D300E']);
        DB::table('colors')->insert(['nome' => 'Marrom-claro', 'tonalidade' => '#8A180D']);
        DB::table('colors')->insert(['nome' => 'Marrom', 'tonalidade' => '#6B120E']);
        DB::table('colors')->insert(['nome' => 'Marrom-escuro', 'tonalidade' => '#5B100B']);
        DB::table('colors')->insert(['nome' => 'Marrom muito escuro', 'tonalidade' => '#3E0E0C']);
        DB::table('colors')->insert(['nome' => 'Preto', 'tonalidade' => '#1E0B07']);
        DB::table('colors')->insert(['nome' => 'Preto opaco', 'tonalidade' => '#090909']);
    }
}
