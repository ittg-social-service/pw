<?php

use Illuminate\Database\Seeder;

class ReferenceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reference_types')->insert([
        	['type' => 'Textos'],
        	['type' => 'Recursos de internet']

        ]);
    }
}
