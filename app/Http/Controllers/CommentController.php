<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Comment;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Walidacja danych
        $validatedData = $request->validate([
            'recipe_id' => 'required|exists:recipes,id',
            'content' => 'required|string',
        ]);

        // Utworzenie komentarza
        $comment = Comment::create([
            'user_id' => Auth::id(),
            'recipe_id' => $validatedData['recipe_id'],
            'content' => $validatedData['content'],
        ]);

        // Przekierowanie do widoku RecipeComment.vue z przekazanymi danymi
        return Redirect::route('recipe-comments', ['recipe' => $validatedData['recipe_id']]);
    }


    public function show($id)
    {
        // Pobierz komentarze dla danego przepisu
        $recipe = Recipe::with('user', 'ingredients')->findOrFail($id);
        $comments = $recipe->comments()->with('user')->get();
        $currentPath = '/recipes/'.$id.'/comments'; // Ustalenie bieżącej ścieżki URL




        return Inertia::render('RecipeComment', [
            'recipe' => $recipe,
            'comments' => $comments,
            'currentPath' => $currentPath, // Przekazanie ścieżki do widoku

        ]);
    }
}
