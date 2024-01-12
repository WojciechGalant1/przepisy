<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;


class RatingController extends Controller
{
    public function rateRecipe(Request $request, $id)
    {
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $rating = Rating::updateOrCreate(
            ['user_id' => auth()->id(), 'recipe_id' => $id],
            ['rating' => $validatedData['rating']]
        );

        //return $this->show($id);
        
    }


    public function show($id)
    {
        $recipe = Recipe::findOrFail($id);
        $averageRating = Rating::where('recipe_id', $id)->avg('rating');

        return Inertia::render('RecipeDetail', [
            'recipe' => $recipe,
            'averageRating' => $averageRating,
        ]);
    }

}
