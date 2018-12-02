<?php

use Illuminate\Database\Seeder;

class imageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('image')->insert([
        	['nom' => 'abc','image' => '1.jpg','contenu' => 'abc','link' => 'google.com'],
        	['nom' => 'abc','image' => '2.jpg','contenu' => 'abc','link' => 'google.com'],
        	['nom' => 'abc','image' => '3.jpg','contenu' => 'abc','link' => 'google.com'],
        	['nom' => 'abc','image' => '4.jpg','contenu' => 'abc','link' => 'google.com']       	
    	]);
    }
}
