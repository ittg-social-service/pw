<?php

use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
        	['key' => 'ACF – 0901', 'name' => 'Cálculo Diferencial', 'semester_id' => 1]
        ]);
    }
}
