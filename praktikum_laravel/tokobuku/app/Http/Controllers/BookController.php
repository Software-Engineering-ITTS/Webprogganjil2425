<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use Storage;
use File;
use DB;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(6); // Fetch 10 records per page

        return view('books.index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // var_dump($request->get('judul'));

        $val_data = Validator::make($request->all(), [
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required',
            'stock' => 'required',
            'harga' => 'required',
        ]);


        if ($val_data->fails()) {
            var_dump($val_data->fails());
            return redirect()->route('books.create');
            // return route('books.create');
        }


        if ($request->hasFile('cover')) {
            $image = $request->file('cover');

            $filename = $image->hashName();
            $path = $image->store('public/uploads');


            $file = new File;
            $file->name = $filename;
            $file->path = $path;
        }

        $save = Book::Create([
            'judul' => $request->get('judul'),
            'penulis' => $request->get('penulis'),
            'tahun_terbit' => $request->get('tahun_terbit'),
            'stock' => $request->get('stock'),
            'harga' => $request->get('harga'),
            'cover' => $filename,
        ]);

        if ($save) {
            return redirect()->route('books.index');
        } else {
            return redirect()->route('books.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    public function edit($id)
    {
        $book = DB::table('books')->where('id', $id)->first();

        return view('books.form', [
            'id' => $id,
            'book' => $book
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $val_data = Validator::make($request->all(), [
            'id' => 'required',
            'judul' => 'required',
            'penulis' => 'required',
            'tahun_terbit' => 'required',
            'stock' => 'required',
            'harga' => 'required',

        ]);

        $id = $request->get('id');

        if ($val_data->fails()) {
            return redirect()->route('books.edit', $id)
                ->withErrors($val_data)
                ->withInput();
        }

        $book = Book::findOrFail($id);

        if ($request->hasFile('cover')) {

            if ($book->cover && Storage::exists('public/uploads/' . $book->cover)) {
                Storage::delete('public/uploads/' . $book->cover);
            }

            $image = $request->file('cover');
            $filename = $image->hashName();
            $path = $image->store('public/uploads');

            $book->cover = $filename;
        }


        $book->judul = $request->get('judul');
        $book->penulis = $request->get('penulis');
        $book->tahun_terbit = $request->get('tahun_terbit');
        $book->stock = $request->get('stock');
        $book->harga = $request->get('harga');


        if ($book->save()) {
            return redirect()->route('books.index');
        } else {
            return redirect()->route('books.edit', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // get data buku sesuai id
        $book = DB::table('books')->where('id', $id)->first();

        if ($book) {
            // cek gambar yg di upload
            if ($book->cover && Storage::exists('public/uploads/' . $book->cover)) {
                Storage::delete('public/uploads/' . $book->cover);
            }

            // Baru delete buku yg di db
            // DB::table('books')->where('id', $id)->delete();
            // Soft Delete

            // search for the all transaction list containing id buku
            // access the transaction
            // set deleted_at on transction
            // Find all transaction lists containing the book
            $transactionLists = DB::table('transaction_lists')->where('book_id', $id)->get();

            foreach ($transactionLists as $transactionList) {
                // Soft delete the transaction list
                DB::table('transaction_lists')->where('id', $transactionList->id)->update([
                    'deleted_at' => now()
                ]);

                DB::table('transactions')->where('id', $transactionList->transaction_id)->update([
                    'deleted_at' => now()
                ]);   
            }

            DB::table('books')->where('id', $id)->update([
                'deleted_at' => now()
            ]);

            return redirect()->route('books.index')->with('success', 'Data Buku berhasil dihapus!');
        }

        return redirect()->route('books.index')->with('error', 'Data Buku tidak ditemukan!');
    }
}
