<?php

namespace App\Http\Controllers;

use App\Models\Expanse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ExpanseController extends Controller
{
    public function index()
    {
        $expanses = Expanse::orderBy('created_at', 'desc')->get();
        return Inertia::render('expanses/Index', ['expanses' => $expanses]);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $create_expanse = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'short_description' => 'nullable|string|max:1000',
        ]);

        // Store the expanse in the database
        Expanse::create($create_expanse);

        return back()->with('success', 'Expanse created successfully.');
    }

    public function update(Request $request, Expanse $expanse)
    {
        // Validate the request data
        $update_expanse = $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'short_description' => 'nullable|string|max:1000',
        ]);

        // Update the expanse in the database
        $expanse->update($update_expanse);

        return back()->with('success', 'Expanse updated successfully.');
    }

    public function destroy($id)
    {
        // Find the expanse by ID
        $expanse = Expanse::findOrFail($id);

        // Delete the expanse
        $expanse->delete();

        return back()->with('success', 'Expanse deleted successfully.');
    }
}
