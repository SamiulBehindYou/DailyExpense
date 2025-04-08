<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ExpanseController extends Controller
{
    public function index()
    {
        return Inertia::render('expanses/Index');
    }
}
