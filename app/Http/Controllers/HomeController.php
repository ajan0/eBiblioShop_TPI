<?php

namespace App\Http\Controllers;

use App\Repositories\BookRepository;

class HomeController extends Controller
{
    protected $booksRepository;

    public function __construct()
    {
        $this->bookRepository = new BookRepository();
    }

    public function index()
    {
        return view('home')->with([
            'book_feautred' => $this->bookRepository->featured(),
            'books_free' => $this->bookRepository->allFree(),
            'books_recent' => $this->bookRepository->allRecent(),
        ]);
    }
}
