<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(categorieSeeder::class);
        $this->call(typeDePublicationSeeder::class);
        $this->call(publicationSeeder::class);
        $this->call(usersSeeder::class);
        $this->call(commentaireSeeder::class);
        $this->call(adminSeeder::class);
        $this->call(imageSeeder::class);

    }
}
