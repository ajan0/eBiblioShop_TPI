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
            'fullname' => 'Antoine Balzeau',
        ]);

        DB::table('authors')->insert([
            'fullname' => 'Benno Tuchschmid',
        ]);

        DB::table('authors')->insert([
            'fullname' => 'Balz Spörri',
        ]);

        DB::table('authors')->insert([
            'fullname' => 'René Staubli',
        ]);

        DB::table('authors')->insert([
            'fullname' => 'Annie Ernaux',
        ]);

        DB::table('authors')->insert([
            'fullname' => 'Fabienne Verdier',
        ]);

        DB::table('authors')->insert([
            'fullname' => 'Thomas Römer',
        ]);

        DB::table('authors')->insert([
            'fullname' => 'Frank Henry Netter',
        ]);

        DB::table('authors')->insert([
            'fullname' => 'Amin Maalouf',
        ]);

        DB::table('authors')->insert([
            'fullname' => 'Vincent Le Goff',
        ]);

        DB::table('authors')->insert([
            'fullname' => 'Nicolas Wauters',
        ]);

        // Pivot table.
        DB::table('author_book')->insert([
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
