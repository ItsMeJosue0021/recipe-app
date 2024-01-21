<?php

namespace App\Repositories;

use App\Models\Ingredient;

Class IngredientRepository
{
    protected $ingredientModel;

    public function __construct(Ingredient $ingredientModel)
    {
        $this->ingredientModel = $ingredientModel;
    }

    public function getAll()
    {
        return $this->ingredientModel::all();
    }

    public function getById(int $ingredientId): ?Ingredient
    {
        return $this->ingredientModel::find($ingredientId);
    }

    public function create(array $ingredientData): Ingredient
    {
        return $this->ingredientModel::create($ingredientData);
    }

    public function update(int $ingredientId, array $ingredientData): Ingredient
    {
        $ingredient = $this->ingredientModel::findOrFail($ingredientId);
        $ingredient->update($ingredientData);
        return $ingredient;
    }

    public function deleteById(int $ingredientId): void
    {
        $ingredient = $this->ingredientModel::findOrFail($ingredientId);
        $ingredient->delete();
    }
}
