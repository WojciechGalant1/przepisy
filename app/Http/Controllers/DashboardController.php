<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index()
    {
        $recipes = Recipe::where('user_id', Auth::id())->get(['id', 'title']);

        return Inertia::render('Dashboard', [
            'recipes' => $recipes
        ]);
    }
}
