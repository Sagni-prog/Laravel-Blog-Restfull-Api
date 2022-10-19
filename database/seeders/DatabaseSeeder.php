<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\Note::factory(10)->create();

        \App\Models\Note::factory()->create([
            'note' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum nisi corrupti debitis sunt pariatur quas non error laborum doloremque explicabo excepturi maxime quasi, adipisci quis repudiandae! Quasi expedita dolor recusandae.',
            
        ]);
    }
}
