<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\view\Book;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $book = Book::find($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "nama" => $book->title,
                "jumlah" => 1,
                "harga" => $book->price,
                "cover" => $book->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'berhasil di tambahkan!');
    }

    public function viewCart()
    {
        return view('cart'); // You need to create a cart.blade.php for displaying the cart.
    }

    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["jumlah"] = $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'berhasil terupdate!');
        }
    }

    public function removeFromCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'berhasil di hapus!');
        }
    }
}
