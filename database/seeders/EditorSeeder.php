<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EditorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('editors')->insert([
            ['name' => 'Editions Tallandier'],
            ['name' => 'Editions Livreo-Alphil'],
            ['name' => 'Editions Gallimard'],
            ['name' => 'LGF/Le Livre de Poche'],
            ['name' => 'Points'],
            ['name' => 'Elsevier Masson'],
            ['name' => 'Eyrolles'],
            ['name' => 'RACINE BE'],
        ]);
    }
}
