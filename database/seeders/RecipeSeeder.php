<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::whereBetween('id', [1, 5])->get();

        foreach ($users as $user) {
            Recipe::factory()->count(3)->create(['user_id' => $user->id]);
        }
    }
}
