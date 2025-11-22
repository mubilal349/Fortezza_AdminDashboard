<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalleryProduct;

class GalleryProductController extends Controller
{
    // Display all gallery products
    public function index()
    {
        $products = GalleryProduct::all();
        return view('admin.gallery.index', compact('products'));
    }

    // Show form to create a new product
    public function create()
    {
        return view('admin.gallery.create');
    }

    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gallery', 'public');
        }

        GalleryProduct::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.gallery.index')->with('success', 'Product added successfully.');
    }

    // Show form to edit an existing product
    public function edit($id)
    {
        $product = GalleryProduct::findOrFail($id);
        return view('admin.gallery.edit', compact('product'));
    }

    // Update the product
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $product = GalleryProduct::findOrFail($id);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('gallery', 'public');
            $product->image = $imagePath;
        }

        $product->name = $request->name;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('admin.gallery.index')->with('success', 'Product updated successfully.');
    }

    // Delete a product
    public function destroy($id)
    {
        $product = GalleryProduct::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Product deleted successfully.');
    }
}
