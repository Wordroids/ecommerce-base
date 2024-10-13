<?php

namespace App\Http\Controllers;

use App\Models\Make;
use App\Http\Requests\StoreMakeRequest;
use App\Http\Requests\UpdateMakeRequest;
use Illuminate\Http\Request;

class MakeController extends Controller
{
     /**
     * Display a listing of the makes.
     */
    public function index()
    {
        $makes = Make::all();
        return view('pages.admin.makes.index', compact('makes'));
    }

    /**
     * Show the form for creating a new make.
     */
    public function create()
    {
        return view('pages.admin.makes.create');
    }

    /**
     * Store a newly created make in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:makes,name',
            'description' => 'nullable|string|max:255',
        ]);

        // Create a new make
        Make::create($validated);

        return redirect()->route('makes.index')->with('success', 'Make created successfully.');
    }

    /**
     * Show the form for editing the specified make.
     */
    public function edit(Make $make)
    {
        return view('pages.admin.makes.edit', compact('make'));
    }

    /**
     * Update the specified make in storage.
     */
    public function update(Request $request, Make $make)
    {
        // Validate the request
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:makes,name,' . $make->id,
            'description' => 'nullable|string|max:255',
        ]);

        // Update the make
        $make->update($validated);

        return redirect()->route('makes.index')->with('success', 'Make updated successfully.');
    }

    /**
     * Remove the specified make from storage.
     */
    public function destroy(Make $make)
    {
        // Delete the make
        $make->delete();

        return redirect()->route('makes.index')->with('success', 'Make deleted successfully.');
    }
}
