<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Editor;
use App\Providers\AppServiceProvider;
use App\Providers\RouteServiceProvider;
use App\Repositories\BooksRepository;
use App\Services\BookLookup\BookLookup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    public function createStepOne()
    {
        if (session()->has('searchedBook'))
        {
            return redirect()->route('books.create'); 
        }
        return view('books.create.step1');
    }

    public function storeStepOne(Request $request)
    {
        $validated = $request->validate([
            'isbn' => 'required|digits:13',
        ]);

        $api = new BookLookup;
        $isbn = $validated['isbn'];
        $bookData = $api->search($isbn);

        if ($bookData)
        {
            $book = new Book;
            $book->isbn = $isbn;

            foreach ($bookData as $attribute => $value)
            {
                if ($value)
                {
                    $book->{$attribute} = $value;
                }
            }

            // Download the cover.
            $response = Http::get("https://covers.openlibrary.org/b/isbn/$isbn-M.jpg");
            
            if (    $response->ok()
                    && isset($response->getHeader('Content-Type')[0])
                    && $response->getHeader('Content-Type')[0] === 'image/jpeg')
            {
                Storage::disk('public')->put("covers/$isbn.jpg", $response->getBody()->getContents());
                $book->cover_path = "storage/covers/$isbn.jpg";
            }

            session(['searchedBook' => $book]);
        }        
        return redirect()->route('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBookRequest $request)
    {
        $providedBook = session('searchedBook');
        $book = (new Book)->fill($request->validated());
        $book->price = $book->price * 100;

        // The cover field is passed conditionally. When the API provide a cover,
        // the `cover` rule is omitted as so we need to make sure that a cover was passed to the request.
        if ($providedBook && array_key_exists('cover_path', $providedBook->getAttributes()))
        {
            $book->cover_path = $providedBook->cover_path;
        }
        else
        {
            $file = $request->file('cover')->storeAs('covers', $book->isbn . '.jpg', 'public');
            $book->cover_path = 'storage/' . $file;
        }

        // Associate the current user.
        $book->user()->associate(Auth::user());
        
        $book->save();
        
        // Associate the book's author(s).
        $author_ids = [];

        // If authors were provided by the API.
        if (isset($providedBook->authors))
        {
            foreach ($providedBook->authors as $author_fullname)
            {
                $author = Author::firstOrCreate(['fullname' => $author_fullname]);
                $author_ids[] = $author->id;
            }
            $book->authors()->sync($author_ids);
        }
        // If not provided by the API, sync from the form request.
        else
        {
            $book->authors()->sync($request->authors);
        }


        if (session()->has('searchedBook'))
        {
            session()->remove('searchedBook');
        }

        return redirect()->route('books.show', $book);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    public function search(Request $request)
    {
        $category = $request->input('category');
        $query = $request->input('query');

        return view('search')->with([
            'query' => $query,
            'results' => (new BooksRepository)->search($query, $category),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        abort_if(Auth::user()->cannot('delete', $book), 403);

        if ($book->delete())
        {
            return redirect(RouteServiceProvider::HOME);
        }
        return abort(500);
    }

    public function destroySaved()
    {
        if(session()->has('searchedBook'))
        {
            session()->remove('searchedBook');
        }
        return redirect()->route('books.create.step1');
    }
}
