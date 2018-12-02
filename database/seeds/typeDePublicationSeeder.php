<?php

use Illuminate\Database\Seeder;

class typeDePublicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typeDePublication')->insert([
        	['idCategorie'=>'1','nom' => 'football','nomSansAccent' => 'football'],
            ['idCategorie'=>'1','nom' => 'ping pong','nomSansAccent' => 'ping-pong'],
        	['idCategorie'=>'2','nom' => 'France','nomSansAccent' => 'France'],
            ['idCategorie'=>'2','nom' => 'Viet Nam','nomSansAccent' => 'Viet-Nam']
        ]);
    }
}
