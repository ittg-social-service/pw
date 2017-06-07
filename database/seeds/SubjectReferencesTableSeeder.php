<?php

use Illuminate\Database\Seeder;

class SubjectReferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reference_subject')->insert([
        	[ 'subject_id' => 1, 'reference_id' => 1],
            [ 'subject_id' => 1, 'reference_id' => 2],
        	[ 'subject_id' => 1, 'reference_id' => 3]
          
  
        ]);
    }
}
