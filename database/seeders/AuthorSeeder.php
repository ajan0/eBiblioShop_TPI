<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert([
            'firstname' => 'Antoine',
            'lastname' => 'Balzeau',
        ]);

        DB::table('authors')->insert([
            'firstname' => 'Benno',
            'lastname' => 'Tuchschmid',
        ]);

        DB::table('authors')->insert([
            'firstname' => 'Balz',
            'lastname' => 'Spörri',
        ]);

        DB::table('authors')->insert([
            'firstname' => 'René',
            'lastname' => 'Staubli',
        ]);

        DB::table('authors')->insert([
            'firstname' => 'Annie',
            'lastname' => 'Ernaux',
        ]);

        DB::table('authors')->insert([
            'firstname' => 'Fabienne',
            'lastname' => 'Verdier',
        ]);

        DB::table('authors')->insert([
            'firstname' => 'Thomas',
            'lastname' => 'Römer',
        ]);

        DB::table('authors')->insert([
            'firstname' => 'Frank Henry',
            'lastname' => 'Netter',
        ]);

        DB::table('authors')->insert([
            'firstname' => 'Amin',
            'lastname' => 'Maalouf',
        ]);

        DB::table('authors')->insert([
            'firstname' => 'Vincent',
            'lastname' => 'Le Goff',
        ]);

        DB::table('authors')->insert([
            'firstname' => 'Nicolas',
            'lastname' => 'Wauters',
        ]);

        // Pivot table.
        DB::table('book_author')->insert([
            ['book_id' => 1, 'author_id' => 1],
            ['book_id' => 2, 'author_id' => 2],
            ['book_id' => 2, 'author_id' => 3],
            ['book_id' => 2, 'author_id' => 4],
            ['book_id' => 3, 'author_id' => 5],
            ['book_id' => 4, 'author_id' => 6],
            ['book_id' => 5, 'author_id' => 7],
            ['book_id' => 6, 'author_id' => 8],
            ['book_id' => 7, 'author_id' => 9],
            ['book_id' => 8, 'author_id' => 10],
            ['book_id' => 9, 'author_id' => 11],
        ]);
    }
}
