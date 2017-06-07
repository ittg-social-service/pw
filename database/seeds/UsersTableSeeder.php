<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
        	[
        		'name' => 'Eliver',
        		'avatar' => '/images/defaults/admin.png', 
        		'email' => 'eliverlara@gamil.com', 
        		'password' => bcrypt('admin'), 
        		'role_id' => 1
        	]

        ]);
    }
}
