<?php

use Illuminate\Database\Seeder;

class categorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorie')->insert([
        	['nom' => 'Sport','nomSansAccent' => 'Sport'],
        	['nom' => 'Les pays','nomSansAccent' => 'Les-pays']
    	]);
    }
}
