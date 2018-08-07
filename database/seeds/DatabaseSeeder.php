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
        DB::table('users')->insert(array(
            array('email' => 'support@propertyZone.com', 'password' => bcrypt('ADMIN12345'),'role' => "admin",'status' => true)
        ));
    }
}
