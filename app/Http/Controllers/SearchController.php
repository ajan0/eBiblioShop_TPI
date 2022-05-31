<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        return view('search')->with([
            'query' => $query
        ]);
    }
}
