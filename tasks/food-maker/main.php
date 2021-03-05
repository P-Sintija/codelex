<?php


require_once 'Recipe.php';
require_once 'RecipeCollection.php';
require_once 'Ingredient.php';
require_once 'IngredientCollection.php';


$fruit = new Recipe('Fruit salad');
$fruit->setIngredient(new Ingredient('grape'));
$fruit->setIngredient(new Ingredient('pear'));
$fruit->setIngredient(new Ingredient('tomato'));

$salad = new Recipe('Salad salad');
$salad->setIngredient(new Ingredient('salad'));
$salad->setIngredient(new Ingredient('cabbage'));
$salad->setIngredient(new Ingredient('tomato'));
$salad->setIngredient(new Ingredient('cucumber'));

$recipes = new RecipeCollection();
$recipes->addNewRecipe($fruit);
$recipes->addNewRecipe($salad);
printAllRecipes($recipes);

$list = new IngredientCollection();
askForIngredients($list);

$recipes->setRecipesCanMake($list);
printStatement($recipes, $list);


function printAllRecipes(RecipeCollection $recipes): void
{
    foreach ($recipes->getAllRecipes() as $recipe) {
        echo 'For ' . $recipe->getName() . ' you need: ' . printIngredients($recipe->getIngredients());
    }
}

function askForIngredients(IngredientCollection $list): void
{
    echo PHP_EOL;
    $ingredient = strtolower(readline('Enter an ingredient you have: '));
    $list->addIngredientToList(new Ingredient($ingredient));
    $choice = strtolower(readline('Enter another one (y/n): '));
    if ($choice !== 'n') {
        askForIngredients($list);
    }
}

function printIngredients(array $ingredients): string
{
    return implode(' ', array_map(function (Ingredient $ingredient) {
            return $ingredient->getName();
        }, $ingredients)) . PHP_EOL;
}

function printStatement(RecipeCollection $recipes, IngredientCollection $list): void
{
    if (count($recipes->getRecipesCanMake()) > 0) {
        foreach ($recipes->getRecipesCanMake() as $recipe) {
            echo PHP_EOL . 'You can make: ' . $recipe->getName() . PHP_EOL;
            $recipe->setMissingIngredients($list);
            echo 'You just need: ' . strtoupper(printIngredients($recipe->getMissingIngredients())) ;
        }
    } else {
        echo 'Sorry! You do not have any of the required ingredients!';
    }

}


