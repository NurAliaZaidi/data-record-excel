<?php

namespace Database\Seeders;

use App\Models\Students;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $students = [
            [
                'name' => 'Suraya',
                'class' => 'Berlian',
                'level' => 1,
                'parent_contact' => '0198763423'
            ],
            [
                'name' => 'Danial',
                'class' => 'Intan',
                'level' => 4,
                'parent_contact' => '0143567323'
            ],
        ];

        Students::insert($students);
    }
}
