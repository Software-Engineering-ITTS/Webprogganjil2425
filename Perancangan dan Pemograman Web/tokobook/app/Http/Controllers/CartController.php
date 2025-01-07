<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class CartController extends Controller
{
    public function index()
    {
        $cartItems = auth()->user()->cart()->with('book')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->book->price * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Book $book)
    {
        $cart = auth()->user()->cart()->where('book_id', $book->id)->first();

        if ($cart) {
            $cart->increment('quantity');
        } else {
            auth()->user()->cart()->create([
                'book_id' => $book->id,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Book added to cart successfully');
    }

    public function remove(Book $book)
    {
        auth()->user()->cart()->where('book_id', $book->id)->delete();
        return redirect()->back()->with('success', 'Book removed from cart successfully');
    }
}