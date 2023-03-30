<?php
require __DIR__ . '/controllers/recipe-controller.php';
$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

//var_dump($urlPath);

if ('/' === $urlPath || '/index' === $urlPath) {
    browseRecipes();
} elseif ('/add' === $urlPath) {
    addRecipe();
} elseif ('/show' === $urlPath && isset($_GET['id'])) {
    showOneRecipe($_GET['id']);
} else {
    header('HTTP/1.1 404 Not Found');
}
