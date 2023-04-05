<?php

namespace App\Models;

class RecipeModel
{
    private $connection;

    public function __construct()
    {
        $this->connection = new \PDO("mysql:host=" . SERVER . ";dbname=" . DATABASE . ";charset=utf8", USER, PASSWORD);
    }

    function getAll(): array
    {
        // Fetching all recipes from database -  assuming the database is okay
        $statement = $this->connection->query('SELECT * FROM recipe');
        $recipes = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $recipes;
    }

    function getById(int $id): array
    {
        // Fetching a recipe from database -  assuming the database is okay
        $query = 'SELECT * FROM recipe WHERE id=:id';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
    function save(array $recipe): void
    {
        var_dump($recipe);

        $query = 'INSERT INTO recipe (title, description) VALUES(:title, :description);';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':title', $recipe['title'], \PDO::PARAM_STR);
        $statement->bindValue(':description', $recipe['description'], \PDO::PARAM_STR);
        $statement->execute();
    }

    function delete(int $id): void
    {
        // Fetching a recipe from database -  assuming the database is okay
        $query = 'DELETE FROM recipe WHERE id=:id';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        $statement->execute();
    }

    function edit(array $recipe): void
    {
        // Fetching a recipe from database -  assuming the database is okay
        $query = 'UPDATE recipe 
                    SET title = :title,
                    description = :description
                   WHERE id=:id';
        $statement = $this->connection->prepare($query);
        $statement->bindValue(':id', $recipe['id'], \PDO::PARAM_INT);
        $statement->bindValue(':title', $recipe['title'], \PDO::PARAM_STR);
        $statement->bindValue(':description', $recipe['description'], \PDO::PARAM_STR);
        $statement->execute();
    }
}
