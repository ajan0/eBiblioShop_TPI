<?php

namespace App\Repositories;

use App\Models\Book;

class BooksRepository
{
    public function allFree()
    {
        return Book::where('price', 0)
                    ->limit(5)
                    ->get();
    }

    
    public function allRecent()
    {
        return Book::orderBy('created_at', 'DESC')
                    ->limit(5)
                    ->get();
    }
}