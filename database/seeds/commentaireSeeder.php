<?php

use Illuminate\Database\Seeder;

class commentaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contenu = array(
    		'Bon article',
    		'olala',
    		'haha',
    		'wow',
    		'bien',
    		'bravo!',
    		'parfait!',
    		'ok, bon',
    		'hehm',
    		'un like'
    	);

    	for($i=1;$i<=20;$i++)
    	{
	        DB::table('commentaire')->insert(
	        	[
	        		'idUser' => rand(1,10),
	            	'idPublication' => rand(1,8),
	            	'contenu' => $contenu[rand(0,9)],
	            	'created_at' => new DateTime()
	        	]
	    	);
    	}
    }
}
