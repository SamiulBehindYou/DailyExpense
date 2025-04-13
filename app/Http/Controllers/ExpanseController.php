<?php

namespace App\Http\Controllers;

use App\Models\Expanse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ExpanseController extends Controller
{
    public function index()
    {
        return Inertia::render('expanses/Index');
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
}
