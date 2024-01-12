<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeIngredient extends Model
{
    use HasFactory;
    protected $fillable = [
        'recipe_id',
        'ingredient_id',
        'quantity',
        'unit',
    ];

    // Relacja z przepisami
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    // Relacja ze składnikami
    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
