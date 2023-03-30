<?php
require_once 'config.php';
require __DIR__ . '/src/models/recipe-model.php';

//  INITIALISE VARIABLES
$errors = [];

// Input GET parameter validation (integer >0)
$id = filter_var($_GET['id'], FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]);
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

// Generate the web page
require __DIR__ . '/src/views/showRecipe.php';
