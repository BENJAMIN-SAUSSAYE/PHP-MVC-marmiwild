<?php

//require_once __DIR__ . '/controllers/RecipeController.php';
$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//var_dump($urlPath);
$recipeController = new App\Controllers\RecipeController();

if ('/' === $urlPath || '/index' === $urlPath) {
    echo $recipeController->browseRecipes();
} elseif ('/add' === $urlPath) {
    echo $recipeController->addRecipe();
} elseif ('/show' === $urlPath && isset($_GET['id'])) {
    echo $recipeController->showOneRecipe($_GET['id']);
} elseif ('/edit' === $urlPath && isset($_GET['id'])) {
    echo $recipeController->editRecipe($_GET['id']);
} elseif ('/delete' === $urlPath && isset($_GET['id'])) {
    echo $recipeController->deleteRecipe();
} else {
    header('HTTP/1.1 404 Not Found');
}
