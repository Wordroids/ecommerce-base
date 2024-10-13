<?php

namespace App\Http\Controllers;

use App\Models\Make;
use App\Models\Models;
use Illuminate\Http\Request;

class ModelsController extends Controller
{
    /**
     * Display a listing of the models.
     */
    public function index()
    {
        $models = Models::with('make')->get(); // Eager loading the make
        return view('pages.admin.models.index', compact('models'));
    }

    /**
     * Show the form for creating a new model.
     */
    public function create()
    {
        $makes = Make::all(); // Fetch all makes to associate a model
        return view('pages.admin.models.create', compact('makes'));
    }

    /**
     * Store a newly created model in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:models,name',
            'make_id' => 'required|exists:makes,id', // Ensure the make exists
            'description' => 'nullable|string|max:255',
        ]);

        // Create a new model
        Models::create($validated);

        return redirect()->route('models.index')->with('success', 'Model created successfully.');
    }

    /**
     * Show the form for editing the specified model.
     */
    public function edit(Models $model)
    {
        $makes = Make::all(); // Fetch all makes for the dropdown
        return view('pages.admin.models.edit', compact('model', 'makes'));
    }

    /**
     * Update the specified model in storage.
     */
    public function update(Request $request, Models $model)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:models,name,' . $model->id,
            'make_id' => 'required|exists:makes,id',
            'description' => 'nullable|string|max:255',
        ]);

        // Update the model
        $model->update($validated);

        return redirect()->route('models.index')->with('success', 'Model updated successfully.');
    }

    /**
     * Remove the specified model from storage.
     */
    public function destroy(Models $model)
    {
        // Delete the model
        $model->delete();

        return redirect()->route('models.index')->with('success', 'Model deleted successfully.');
    }

    public function getByMake($makeId)
    {
        $models = Models::where('make_id', $makeId)->get();
        return response()->json($models);
    }
}
