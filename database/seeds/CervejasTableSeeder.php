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
            'nome' => 'Javali Beer American Pale Ale',
            'IBU' => '41',
            'ABV' => '5.3',
            'SRM' => '4.0',
            'EBC' => '8.0',
            'copo_id' => 2,
            'estilo_id' => 3,
            'color_id' => 4,
            'fabricante_id' => 2,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
            ]);

        DB::table('cervejas')->insert([
            'nome' => 'Javali Beer American Lager',
            'IBU' => '26',
            'ABV' => '4.8',
            'SRM' => '3.5',
            'EBC' => '7.5',
            'copo_id' => 2,
            'estilo_id' => 2,
            'color_id' => 3,
            'fabricante_id' => 2,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
            ]);

        DB::table('cervejas')->insert([
            'nome' => 'Javali Beer Weiss',
            'IBU' => '18',
            'ABV' => '5.1',
            'SRM' => '3.3',
            'EBC' => '6.5',
            'copo_id' => 2,
            'estilo_id' => 18,
            'color_id' => 3,
            'fabricante_id' => 2,
            'created_at' => date('Y-m-d h:i:s'),
            'updated_at' => date('Y-m-d h:i:s')
            ]);
    }
}
