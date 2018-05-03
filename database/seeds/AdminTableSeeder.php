<?php

use Illuminate\Database\Seeder;
use App\Admin as Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
  
        Admin::create( [
            'email' => 'vbacch@gmail.com' ,
            'password' => Hash::make( 'V!n!c1u$' ) ,
            'name' => 'Vinicius' ,
        ] );
    }
}