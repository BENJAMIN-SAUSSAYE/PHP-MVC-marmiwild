<?php
require __DIR__ . '/../models/recipe-model.php';
function browseRecipes(): void
{
    $recipes = getAllRecipes();

    require __DIR__ . '/../views/listOfRecipes.php';
}

function addRecipe(): void
{
    //  INITIALISE VARIABLES
    $errors = [];
    $maxLengthTitle = 100;
    $maxLengthDescription = 2000;

    //  CHECK POST METHOD ONLY
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //  SANITIZE POST DATA
        if (!empty($_POST)) {
            //suppression des espaces
            $datas = array_map('trim', $_POST);

            // nettoyage et validation des données soumises via le formulaire
            if (empty($datas['title'])) {
                $errors[] = "Le titre est obligatoire.";
            }
            if (empty($datas['description'])) {
                $errors[] = "La description est obligatoire.";
            }

            if (mb_strlen($datas['title']) > $maxLengthTitle) {
                $errors[] = "La zone Titre doit faire une longeur de " . $maxLengthTitle . " caractères ";
            }
            if (mb_strlen($datas['description']) > $maxLengthDescription) {
                $errors[] = "La zone Description doit faire une longeur de " . $maxLengthDescription . " caractères";
            }

            if (count($errors) === 0) {
                saveRecipe($datas);
                header("Location: /");
                exit();
            }
        }
    }

    require __DIR__ . '/../views/addRecipe.php';
}

function showOneRecipe(int $id): void
{
    //  INITIALISE VARIABLES
    $errors = [];

    // Input GET parameter validation (integer >0)
    $id = filter_var($id, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]);
    if (false === $id || null === $id) {
        header("Location: /");
        exit("Wrong input parameter");
    }

    $recipe = getRecipeById($id);

    // Database result check
    if (empty($recipe['title'])) {
        header("Location: /");
        exit("Recipe not found");
    }

    require __DIR__ . '/../views/showRecipe.php';
}
