<?php
namespace services;
use Exception;
use PDO;
use Recipe;
use repositories\reciperepository;

require_once __DIR__ . '/../repositories/recipeRepository.php';

class recipeservice{
    private $recipeservice;

    public function __construct(PDO $dbConnection){
        $this->recipeservice = new reciperepository($dbConnection);
    }
    public function getAllRecipes(){
        return $this->recipeservice->getAllRecipes();
    }
    public function getRecipeByCategory($category){
        return $this->recipeservice->getRecipeByCategory($category);
    }
    public function createRecipe(Recipe $recipe){
        try{
            $this->recipeservice->createRecipe(
                $recipe->getTitle(),
                $recipe->getIngredients(),
                $recipe->getInstructions(),
                $recipe->getImage(),
                $recipe->getUserID(),
                $recipe->getCategory()
            );
        }catch (Exception $e){
            throw $e;
        }
    }
    public function getLatestRecipe()
    {
return $this->recipeservice->getLatestRecipe();
    }
}