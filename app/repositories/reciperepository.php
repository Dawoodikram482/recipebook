<?php
namespace repositories;

use Category;
use PDOException;
use PDO;

require_once __DIR__ . '/../config/dbconfig.php';
require_once __DIR__ . '/../models/Recipe.php';
require_once __DIR__ . '/../models/Category.php';
class reciperepository{
    private $database;

    public function __construct(PDO $dbConnection){
        $this->database = $dbConnection;
    }
    public function getAllRecipes()
    {
     $sql = "SELECT * FROM Recipe";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, \models\Recipe::class);
        $recipes = $stmt->fetchAll();
        return $recipes;
    }
    public function getRecipeByCategory(Category $category)
    {
        $sql = "SELECT * FROM Recipe WHERE Category = :category";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':category', $category);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, \models\Recipe::class);
        $recipes = $stmt->fetchAll();
        return $recipes;
    }
    public function createRecipe($title, $ingredients,$instructions,$image,$userID,$category){
        try{
            $sql = "INSERT INTO Recipe (Title, Ingredients, Instructions, Image, UserID, Category) VALUES (:title, :ingredients, :instructions, :image, :userID, :category)";
            $stmt = $this->database->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':ingredients', $ingredients);
            $stmt->bindParam(':instructions', $instructions);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':category', $category);
            $stmt->execute();
        }catch(PDOException $e){
            error_log($e->getMessage());
            echo "Error adding recipe: " . $e->getMessage();
        }
    }
    public function getLatestRecipe()
    {
        $sql = "SELECT * FROM Recipe ORDER BY RecipeID DESC LIMIT 1";
        $stmt = $this->database->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, \models\Recipe::class);
        $recipe = $stmt->fetch();
        return $recipe;
    }

}