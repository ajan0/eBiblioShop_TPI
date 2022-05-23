<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['title' => 'Loisirs & Jeux'],
            ['title' => 'Histoire'],
            ['title' => 'Littérature'],
            ['title' => 'Arts & Spectacles'],
            ['title' => 'Religions'],
            ['title' => 'Médecine'],
            ['title' => 'Sciences humaines et sociales'],
            ['title' => 'Informatique & Multimédia'],
        ]);
    }
}
