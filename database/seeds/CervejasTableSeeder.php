<?php

use Illuminate\Database\Seeder;

class CervejasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cervejas')->insert([
            'nome' => 'Javali Beer',
            'IBU' => '26',
            'ABV' => '5',
            'SRM' => '4',
            'EBC' => '7',
            'copo_id' => 2,
            'estilo_id' => 2,
            'color_id' => 4,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
            ]);
    }
}
