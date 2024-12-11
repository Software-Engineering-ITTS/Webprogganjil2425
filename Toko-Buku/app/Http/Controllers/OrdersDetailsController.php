<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrdersDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Orders::all();
        return view('admin.order', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg,avif|max:2048',
            'title' => 'required|unique:books,title',
            'author' => 'required',
            'publisher' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'id_order' => 'required'
        ]);

        $val_data = $request->all();

        if ($request->hasFile('image')) {
            $val_data['image'] = $request->file('image')->store('images', 'public');
        }

        Orders::create($val_data);

        return redirect('/admin/book')->with('success', 'Book created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg,avif|max:2048',
            'title' => 'required|unique:Orders,title,' . $id . ',book_id',
            'author' => 'required',
            'publisher' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'id_order' => 'required'
        ]);

        $book = Orders::findOrFail($id);
        $val_data = $request->all();

        if ($request->hasFile('image')) {
            // Hapus image lama jika ada
            if ($book->image) {
                Storage::disk('public')->delete($book->image);
            }

            $val_data['image'] = $request->file('image')->store('images', 'public');
        }

        $book->update($val_data);

        return redirect('/admin/book')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Orders::findOrFail($id); // Akan otomatis melempar 404 jika tidak ditemukan
        $book->delete();

        return response()->json(['success' => true]);
    }
}
