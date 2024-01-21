<?php

namespace App\Services;

use App\Models\Recipe;
use App\Exceptions\RecipeNotFound;
use App\Repositories\RecipeRepository;

Class RecipeService {

    protected $recipeRepository;

    public function __construct(RecipeRepository $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    public function getAllRecipes()
    {
        return $this->recipeRepository->getAll();
    }

    public function getRecipeById(int $recipeId): ?Recipe
    {
        $recipe = $this->recipeRepository->getById($recipeId);

        if (!$recipe) {
            throw new RecipeNotFound('Recipe not found.');
        }
        return $recipe;
    }

    public function createRecipe(array $recipeData): Recipe
    {
        return $this->recipeRepository->create($recipeData);
    }

    public function updateRecipe(int $recipeId, array $recipeData): Recipe
    {
        return $this->recipeRepository->update($recipeId, $recipeData);
    }

    public function deleteRecipe(int $recipeId) {
        return $this->recipeRepository->deleteById($recipeId);
    }

}
