<?php

use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
	        	[
	        		'name' => 'Nguyen',
	            	'email' => 'vonguyen150296@gmail.com',
	            	'password' => bcrypt('123456'),
	            	'admin'=> 1,
	            	'created_at' => new DateTime(),
	        	]
        	);
    }
}
