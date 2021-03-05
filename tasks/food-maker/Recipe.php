<?php

class Recipe
{
    private string $name;
    private array $ingredients;
    private array $missingIngredients;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setIngredient(Ingredient $ingredient): void
    {
        $this->ingredients[] = $ingredient;
    }

    public function getIngredients(): array
    {
        return $this->ingredients;
    }

    public function setMissingIngredients(IngredientCollection $ingredientList): void
    {
        array_filter($this->ingredients, function (Ingredient $ingredient) use ($ingredientList) {
            if (!in_array($ingredient, $ingredientList->getAllIngredientsInList())) {
                $this->missingIngredients [] = $ingredient;
            }
        });
    }

    public function getMissingIngredients(): array
    {
        return $this->missingIngredients;
    }

}

