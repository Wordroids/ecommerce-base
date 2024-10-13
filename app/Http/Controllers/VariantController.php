<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use App\Models\Model;
use App\Models\Models;
use Illuminate\Http\Request;

class VariantController extends Controller
{
    /**
     * Display a listing of the variants.
     */
    public function index()
    {
        $variants = Variant::with('model.make')->get(); // Eager loading model and make
        return view('pages.admin.variants.index', compact('variants'));
    }

    /**
     * Show the form for creating a new variant.
     */
    public function create()
    {
        $models = Models::with('make')->get(); // Fetch models with their make
        return view('pages.admin.variants.create', compact('models'));
    }

    /**
     * Store a newly created variant in storage.
     */
    public function store(Request $request)
    {
      
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:variants,name',
            'model_id' => 'required|exists:models,id', // Ensure the model exists
            'description' => 'nullable|string|max:255',
        ]);
       
        // Create a new variant
        Variant::create($validated);

        return redirect()->route('variants.index')->with('success', 'Variant created successfully.');
    }

    /**
     * Show the form for editing the specified variant.
     */
    public function edit(Variant $variant)
    {
        $models = Models::with('make')->get(); // Fetch models with their make
        return view('pages.admin.variants.edit', compact('variant', 'models'));
    }

    /**
     * Update the specified variant in storage.
     */
    public function update(Request $request, Variant $variant)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:variants,name,' . $variant->id,
            'model_id' => 'required|exists:models,id',
            'description' => 'nullable|string|max:255',
        ]);

        // Update the variant
        $variant->update($validated);

        return redirect()->route('variants.index')->with('success', 'Variant updated successfully.');
    }

    /**
     * Remove the specified variant from storage.
     */
    public function destroy(Variant $variant)
    {
        // Delete the variant
        $variant->delete();

        return redirect()->route('variants.index')->with('success', 'Variant deleted successfully.');
    }
}
