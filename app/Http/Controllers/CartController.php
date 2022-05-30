<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function store(Book $book)
    {
        Cart::add($book);
        return redirect()->route('cart.index');
    }

    public function update(Request $request, $itemId)
    {
        $validated = $request->validate([
            'qty' => 'required|min:0|max:255'
        ]);
        
        Cart::update($itemId, $request->qty);

        return redirect()->route('cart.index');
    }

    public function destroy($itemId)
    {
        Cart::remove($itemId);

        return back();
    }
}
