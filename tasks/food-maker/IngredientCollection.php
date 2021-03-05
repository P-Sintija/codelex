<?php

class IngredientCollection
{
    private array $allIngredients;

    public function addIngredientToList(Ingredient $ingredient): void
    {
        $this->allIngredients [] = $ingredient;
    }

    public function getAllIngredientsInList(): array
    {
        return $this->allIngredients;
    }
}



