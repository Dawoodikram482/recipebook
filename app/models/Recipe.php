<?php
require_once __DIR__ . '/user.php';
require_once __DIR__ . '/Category.php';
class Recipe implements JsonSerializable
{
    private int $id;
    private string $title;
    private string $ingredients;
    private string $instructions;
    private string $image;
    private user $user;
    private Category $category;
    public function __construct()
    {
        $this->user = new user();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getIngredients(): string
    {
        return $this->ingredients;
    }

    /**
     * @return string
     */
    public function getInstructions(): string
    {
        return $this->instructions;
    }
    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @return user
     */
    public function getUser(): user
    {
        return $this->user;
    }

    /**
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param string $ingredients
     */
    public function setIngredients(string $ingredients): void
    {
        $this->ingredients = $ingredients;
    }

    /**
     * @param string $instructions
     */
    public function setInstructions(string $instructions): void
    {
        $this->instructions = $instructions;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }


    /**
     * @param user $user
     */
    public function setUser(user $user): void
    {
        $this->user = $user;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }
    public function jsonSerialize():mixed
    {
        return get_object_vars($this);
    }
}

