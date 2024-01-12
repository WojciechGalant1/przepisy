<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\RecipeIngredient;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    public function index(): Response
    {
        $recipes = Recipe::all(); 

        return Inertia::render('RecipesIndex', [
            'recipes' => $recipes
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('CreateRecipe');
    }

    public function store(Request $request)
    {
        // Walidacja danych
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'type' => 'nullable|string|max:100',
            'image_path' => 'nullable|url',

            'ingredients' => 'required|array',
            'ingredients.*.name' => 'required|string|max:255',
            'ingredients.*.quantity' => 'required|numeric',
            'ingredients.*.unit' => 'nullable|string|max:50',
        ]);

        // Utworzenie przepisu
        $recipe = new Recipe([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'type' => $validatedData['type'],
            'image_path' => $validatedData['image_path'], 
            'user_id' => Auth::id(), // ID zalogowanego użytkownika
        ]);
        $recipe->save();

        // Dodanie składników do przepisu
        foreach ($validatedData['ingredients'] as $ingredientData) {
            $ingredient = Ingredient::firstOrCreate(['name' => $ingredientData['name']]);
            $recipeIngredient = new RecipeIngredient([
                'ingredient_id' => $ingredient->id,
                'recipe_id' => $recipe->id,
                'quantity' => $ingredientData['quantity'],
                'unit' => $ingredientData['unit'],
            ]);
            $recipeIngredient->save();
        }

        // Przekierowanie po pomyślnym dodaniu przepisu
        return redirect()->route('dashboard')->with('success', 'Przepis został dodany pomyślnie!');


    }

    public function show($id)
    {
        // Pobierz przepis na podstawie ID
        $recipe = Recipe::with('user', 'ingredients')->findOrFail($id);
        $averageRating = Rating::where('recipe_id', $id)->avg('rating');
        $currentPath = '/recipes/'.$id; // Ustalenie bieżącej ścieżki URL


        // Przekazanie danych przepisu do widoku
        return Inertia::render('RecipeDetail', [
            'recipe' => $recipe,
            'averageRating' => $averageRating,
            'currentPath' => $currentPath, // Przekazanie ścieżki do widoku

        ]);
    }


}
