<?php

namespace App\Repositories;

use App\Models\Book;
use App\Providers\AppServiceProvider;

class BooksRepository
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

    public function search($query, $category = null)
    {
        // If search query was provided.
        if ($query)
        {
            return Book::where('title', 'LIKE', "%$query%")
                    ->whereHas('category', fn($q) => $q->where('title', 'LIKE', "%$category%"))
                    ->orWhereHas('authors', fn($q) => $q->where('fullname', 'LIKE', "%$query%"))
                    ->orWhere('isbn', 'LIKE', "%$query%")
                    ->get();
        }
        // If we are only searching by category.
        else
        {
            return Book::whereHas('category', fn($q) => $q->where('title', 'LIKE', "%$category%"))
                    ->get();
        }
    }
}