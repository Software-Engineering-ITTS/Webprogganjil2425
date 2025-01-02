<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('content.category', compact('category'));
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
            'nama' => 'required|unique:categories,nama',
            'deskripsi' => 'required|max:500',
        ]);

        $val_data = $request->all();
        Category::create($val_data);

        return redirect('/category')->with('success', 'Category Created Successfully!');
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
            'nama' => 'required|unique:categories,nama,' . $id . ',id',
            'deskripsi' => 'required|max:500',
        ]);

        $category = Category::findOrFail($id);
        $val_data = $request->all();

        $category->update($val_data);

        return redirect('/category')->with('success', 'Category Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Temukan kategori berdasarkan ID
            $category = Category::findOrFail($id);

            // Periksa apakah kategori memiliki relasi
            if ($category->mesins()->exists()) { // Ganti 'relatedModel' dengan relasi aktual
                return redirect()->back()->withErrors(['Category cannot be deleted because it is associated with other data.']);
            }

            // Lakukan penghapusan
            $category->delete();

            return redirect()->route('category.index')->with('success', 'Category Deleted Successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors(['Category not found.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['An error occurred while deleting the category.']);
        }
    }
}
