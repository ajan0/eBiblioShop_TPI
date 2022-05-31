<?php

namespace App\Http\Controllers;

use App\Repositories\BooksRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $booksRepository;

    public function __construct()
    {
        $this->booksRepository = new BooksRepository();
    }

    public function index()
    {
        return view('home')->with([
            'book_feautred' => $this->booksRepository->featured(),
            'books_free' => $this->booksRepository->allFree(),
            'books_recent' => $this->booksRepository->allRecent(),
        ]);
    }
}
