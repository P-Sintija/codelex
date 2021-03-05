<?php

class RecipeCollection
{
    private array $allRecipes;
    private array $possibleRecipes = [];

    public function addNewRecipe(Recipe $recipe): void
    {
        $this->allRecipes[] = $recipe;
    }

    public function getAllRecipes(): array
    {
        return $this->allRecipes;
    }

    public function setRecipesCanMake(IngredientCollection $ingredients): void
    {
        array_filter($this->allRecipes, function (Recipe $recipe) use ($ingredients) {
            array_filter($ingredients->getAllIngredientsInList(), function (Ingredient $ingredient) use ($recipe) {
                if (in_array($ingredient, $recipe->getIngredients()) && !in_array($recipe, $this->possibleRecipes)) {
                    $this->possibleRecipes [] = $recipe;

                }
            });
        });
    }

    public function getRecipesCanMake(): array
    {
        return $this->possibleRecipes;
    }

}

