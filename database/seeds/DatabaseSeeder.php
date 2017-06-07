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
        $this->call(ReferenceTypesTableSeeder::class);
        $this->call(SemestersTableSeeder::class);
        $this->call(ReferencesTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SubjectReferencesTableSeeder::class);
    }
}
