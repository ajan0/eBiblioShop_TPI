<?php

namespace App\Repositories;

use App\Models\Book;
use App\Providers\AppServiceProvider;

class BookRepository
{
    public function featured()
    {
        return Book::find(AppServiceProvider::FEATURED_BOOK_ID);
    }

    public function allFree()
    {
        return Book::where('quantity', '>', 0)
                    ->where('price', 0)
                    ->groupBy('isbn')
                    ->limit(5)
                    ->get();
    }

    
    public function allRecent()
    {
        return Book::where('quantity', '>', 0)
                    ->orderBy('created_at', 'DESC')
                    ->groupBy('isbn')
                    ->limit(5)
                    ->get();
    }
}