<?php

namespace controllers;

use config\dbconfig;
use services\recipeservice;
use services\userservice;

require_once __DIR__ . '/../services/userservice.php';
require_once __DIR__ . '/../services/recipeservice.php';
require_once __DIR__ . '/../models/Recipe.php';
require_once __DIR__ . '/../models/Category.php';

class recipecontroller{
    private $databaseConnection;
    private $userservice;
    private $recipeservice;
    public function __construct()
    {
        $dbConfig = new dbconfig();
        $this->databaseConnection = $dbConfig->connect();
        $this->userservice = new userservice($this->databaseConnection);
        $this->recipeservice = new recipeservice($this->databaseConnection);
    }

    public function searchPostByCategory($category)
    {
        $sanitizedCategory = htmlspecialchars($category);
        $recipes = $this->recipeservice->getRecipeByCategory($sanitizedCategory);
        return $recipes;
    }
    public function showRecipes()
    {
        $recipes = $this->recipeservice->getAllRecipes();
        return $recipes;
    }
    public function showLatestRecipe()
    {
        $recipe = $this->recipeservice->getLatestRecipe();
        return $recipe;
    }
    public function showSearchPage(){
        $pageTitle = "Search";
        require '../views/searchpage.php';
    }
    public function showCreateRecipePage(){
        $pageTitle = "Create Recipe";
        require '../views/createrecipe.php';
    }
    public function showEditRecipePage(){
        $pageTitle = "Edit Recipe";
        require '../views/editrecipe.php';
    }
}