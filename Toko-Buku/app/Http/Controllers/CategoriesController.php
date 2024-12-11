<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Categories::all();
        return view('admin.category', compact('category'));
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
            'name' => 'required|unique:categories,name',
            'description' => 'required',
        ]);

        $val_data = $request->all();
        Categories::create($val_data);

        return redirect('/admin/categories')->with('success', 'Category created successfully!');
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
            'name' => 'required|unique:categories,name,' . $id . ',category_id',
            'description' => 'required',
        ]);

        $category = Categories::findOrFail($id);
        $val_data = $request->all();

        $category->update($val_data);

        return redirect('/admin/categories')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Temukan kategori berdasarkan ID
            $category = Categories::findOrFail($id);

            // Periksa apakah kategori memiliki relasi
            if ($category->books()->exists()) { // Ganti 'relatedModel' dengan relasi aktual
                return redirect()->back()->withErrors(['Category cannot be deleted because it is associated with other data.']);
            }

            // Lakukan penghapusan
            $category->delete();

            return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->withErrors(['Category not found.']);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['An error occurred while deleting the category.']);
        }
    }
}
