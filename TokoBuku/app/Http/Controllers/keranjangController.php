<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class keranjangController extends Controller
{
    public function index()
    {
        $keranjang = session()->get('keranjang', []);
        $total = collect($keranjang)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('keranjang', compact('keranjang', 'total'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $keranjang = session()->get('cart', []);


        foreach ($keranjang as &$item) {
            if ($item['book_title'] === $request->book_title) {
                $item['quantity'] += $request->quantity;
                session()->put('keranjang', $keranjang);
                return redirect()->route('keranjang.index')->with('success', 'Jumlah buku berhasil diperbarui!');
            }
        }


        $keranjang[] = [
            'book_title' => $request->book_title,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ];
        session()->put('keranjang', $keranjang);

        return redirect()->route('keranjang.index')->with('success', 'Buku berhasil ditambahkan ke keranjang!');
    }


    public function update(Request $request, $index)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $keranjang = session()->get('keranjang', []);
        if (isset($cart[$index])) {
            $keranjang[$index]['quantity'] = $request->quantity;
            session()->put('keranjang', $keranjang);
        }

        return redirect()->route('keranjang.index')->with('success', 'Jumlah buku berhasil diperbarui!');
    }

    // menghapus buku
    public function destroy($index)
    {
        $keranjang = session()->get('keranjang', []);
        if (isset($keranjang[$index])) {
            unset($keranjang[$index]);
            session()->put('keranjang', array_values($keranjang));
        }

        return redirect()->route('keranjang.index')->with('success', 'Buku berhasil dihapus dari keranjang!');
    }
}

