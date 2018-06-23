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
        DB::table('colors')->insert(['nome' => 'Palha', 'hex' => '#F5F360', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Amarelo', 'hex' => '#ECE523', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Dourado', 'hex' => '#E8C219', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Âmbar', 'hex' => '#DD9608', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Cobre-claro', 'hex' => '#CA610E', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Cobre', 'hex' => '#8D300E', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Marrom-claro', 'hex' => '#8A180D', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Marrom', 'hex' => '#6B120E', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Marrom-escuro', 'hex' => '#5B100B', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Marrom muito escuro', 'hex' => '#3E0E0C', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Preto', 'hex' => '#1E0B07', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
        DB::table('colors')->insert(['nome' => 'Preto opaco', 'hex' => '#090909', 'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')]);
    }
}
