<?php

use Illuminate\Database\Seeder;

class ReferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('references')->insert([
        	[
                'description' => 'Anton, H. (2009). Cálculo : trascendentes tempranas. (2ª. Ed.). México. Limusa. ', 
                'existence' => 3, 
                'reference_type_id' => 1
            ],
            [
                'description' => 'Ayres, F. (2010). Cálculo. (5ª. Ed.). México. McGraw-Hill. ', 
                'existence' => 13, 
                'reference_type_id' => 1
            ],
            [
                'description' => 'pagina web ', 
                'existence' => 1, 
                'reference_type_id' => 2
            ]
  
        ]);
    }
}
