<?php
function createConnection(): PDO
{
    return new PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE . ";charset=utf8", USER, PASSWORD);
}
function getAllRecipes(): array
{
    // Fetching all recipes from database -  assuming the database is okay
    $connection = createConnection();
    $statement = $connection->query('SELECT id, title FROM recipe');
    $recipes = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $recipes;
}

function getRecipeById(int $id): array
{
    // Fetching a recipe from database -  assuming the database is okay
    $connection = createConnection();
    $query = 'SELECT title, description FROM recipe WHERE id=:id';
    $statement = $connection->prepare($query);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
}
function saveRecipe(array $recipe): void
{
    var_dump($recipe);

    $connection = createConnection();
    $query = 'INSERT INTO recipe (title, description) VALUES(:title, :description);';
    $statement = $connection->prepare($query);
    $statement->bindValue(':title', $recipe['title'], PDO::PARAM_STR);
    $statement->bindValue(':description', $recipe['description'], PDO::PARAM_STR);
    $statement->execute();
    // lance une requête SQL pour engistrer la recette
}
