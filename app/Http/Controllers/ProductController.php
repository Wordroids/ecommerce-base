<?php

namespace App\Http\Controllers;

use App\Models\Assets;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     */
    public function index()
    {
        $products = Product::all(); // Get all products
        return view('pages.admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        // Fetch all categories and brands from the database
        $categories = Category::all();

        // Pass categories and brands to the view
        return view('pages.admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'product_number' => 'required|string|max:255|unique:products,product_number',
            'sku' => 'required|string|max:255|unique:products,sku',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'condition' => 'required|in:new,used,refurbished',
            'status' => 'required|in:available,out_of_stock,discontinued',
            'price' => 'required|numeric|min:0',
            'discounted_price' => 'nullable|numeric|min:0',
            'available_quantity' => 'required|integer|min:0',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        ]);

        // Store the product
        $product = Product::create([
            'name' => $validatedData['name'],
            'product_number' => $validatedData['product_number'],
            'sku' => $validatedData['sku'],
            'description' => $validatedData['description'],
            'short_description' => $validatedData['short_description'],
            'category_id' => $validatedData['category_id'],
            'condition' => $validatedData['condition'],
            'status' => $validatedData['status'],
            'price' => $validatedData['price'],
            'discounted_price' => $validatedData['discounted_price'],
            'available_quantity' => $validatedData['available_quantity'],
            'created_by' => auth()->id(),
            'updated_by' => auth()->id(),
        ]);

        // Handle the featured image upload
        if ($request->hasFile('featured_image')) {
            $filePath = $request->file('featured_image')->store('products/images', 'public');

            // Store the featured image in the assets table
            Assets::create([
                'file_path' => $filePath,
                'file_type' => 'image',
                'is_featured' => true,
                'assetable_id' => $product->id,
                'assetable_type' => Product::class,
            ]);
        }
        // Redirect back with a success message
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product')); // Show product details
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
            'sku' => 'required|string|max:255|unique:products,sku,' . $product->id,
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete(); // Delete the product

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
