<?php

namespace App\Repositories;

use App\Models\Recipe;

Class RecipeRepository
{
    protected $recipeModel;

    public function __construct(Recipe $recipeModel)
    {
        $this->recipeModel = $recipeModel;
    }

    public function getAll()
    {
        return $this->recipeModel::all();
    }

    public function getById(int $recipeId): ?Recipe
    {
        return $this->recipeModel::find($recipeId);
    }

    public function create(array $recipeData): Recipe
    {
        return $this->recipeModel::create($recipeData);
    }

    public function update(int $recipeId, array $recipeData): Recipe
    {
        $recipe = $this->recipeModel::findOrFail($recipeId);
        $recipe->update($recipeData);
        return $recipe;
    }

    public function deleteById(int $recipeId): void
    {
        $recipe = $this->recipeModel::findOrFail($recipeId);
        $recipe->delete();
    }
}
