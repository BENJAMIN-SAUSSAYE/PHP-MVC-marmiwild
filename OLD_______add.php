<?php
require_once 'config.php';
require __DIR__ . '/src/models/recipe-model.php';

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

// Generate the web page
require __DIR__ . '/src/views/addRecipe.php';
