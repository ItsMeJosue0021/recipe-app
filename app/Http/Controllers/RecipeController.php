<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipeRequest;
use Illuminate\Http\Request;
use App\Services\RecipeService;
use App\Exceptions\RecipeNotFound;

class RecipeController extends Controller
{
    protected $recipeService;

    public function __construct(RecipeService $recipeService)
    {
        $this->recipeService = $recipeService;
    }

    public function index()
    {
        $recipes = $this->recipeService->getAllRecipes();
        return view('recipes.index', compact('recipes'));
    }

    public function show($recipeId)
    {
        try {
            $recipe = $this->recipeService->getRecipeById($recipeId);
            return view('recipes.show', compact('recipe'));

        } catch (RecipeNotFound $e) {
            return back()->withError($e->getMessage());
        }

    }

    public function create()
    {
        return view('recipes.create');
    }

    public function store(StoreRecipeRequest $request)
    {
        $this->recipeService->createRecipe($request->validated());
        return back()->withSuccess('Recipe created successfully.');
    }






}
