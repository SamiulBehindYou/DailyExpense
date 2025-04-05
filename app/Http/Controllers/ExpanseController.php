<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ExpanseController extends Controller
{
    public function index()
    {
        return Inertia::render('expanses/Index', [
            'expanses' => [
                // Sample data
                ['id' => 1, 'name' => 'Groceries', 'amount' => 50],
                ['id' => 2, 'name' => 'Utilities', 'amount' => 100],
            ],
        ]);
    }
}
