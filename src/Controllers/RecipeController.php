<?php

namespace App\Controllers;

use App\Models\RecipeModel;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class RecipeController
{
    private Environment $twig;

    private RecipeModel $recipeModel;
    const MAX_LENGTH_TITLE = 100;
    const MAX_LENGTH_DESCRIPTION = 2000;

    function __construct()
    {
        // TWIG INITIALISATION
        $loader = new FilesystemLoader(__DIR__ . '/../Views/');
        $this->twig = new Environment($loader);

        $this->recipeModel = new RecipeModel();
    }
    function browseRecipes(): string
    {
        //  RESET PROPERTIE ERRORS & DATAS
        $errors = [];
        $datas = [];
        $recipes = $this->recipeModel->getAll();
        return $this->twig->render('Recipe/Index.html.twig', ['recipes' => $recipes]);
        //require __DIR__ . '/../Views/listOfRecipes.php';
    }

    function addRecipe(): string
    {
        //  INIT 
        $errors = [];
        $datas = [];
        $maxLengthTitle = self::MAX_LENGTH_TITLE;
        $maxLengthDescription = self::MAX_LENGTH_DESCRIPTION;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            // NETTOYAGE DES DONNEES
            $datas = array_map('trim', $_POST);
            // VALIDATION DES DONNEES
            $errors = $this->validateDatas($datas);
            if (count($errors) === 0) {
                //SAVE RECEIPE
                $this->recipeModel->save($datas);
                header("Location: /");
                exit();
            }
        }
        // ON AFFICHE LA VUE ADD RECEIPE
        //require __DIR__ . '/../Views/addEditRecipe.php';
        return $this->twig->render('Recipe/Edit.html.twig', ['datas' => $datas, 'errors' => $errors]);
    }

    private function validateDatas(array $datas): array
    {
        $errors = [];
        // Validation des données soumises via le formulaire
        if (empty($datas['title'])) {
            $errors[] = "Le titre est obligatoire.";
        }
        if (empty($datas['description'])) {
            $errors[] = "La description est obligatoire.";
        }
        if (mb_strlen($datas['title']) > self::MAX_LENGTH_TITLE) {
            $errors[] = "La zone Titre doit faire une longeur de " . self::MAX_LENGTH_TITLE . " caractères ";
        }
        if (mb_strlen($datas['description']) > self::MAX_LENGTH_DESCRIPTION) {
            $errors[] = "La zone Description doit faire une longeur de " . self::MAX_LENGTH_DESCRIPTION . " caractères";
        }
        return $errors;
    }

    function showOneRecipe(int $id): string
    {
        // Input GET parameter validation (integer >0)
        $id = filter_var($id, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]);

        if (false === $id || null === $id) {
            header("Location: /");
            exit("Wrong input parameter");
        }

        $recipe = $this->recipeModel->getById($id);

        // Database result check
        if (empty($recipe['title'])) {
            header("Location: /");
            exit("Recipe not found");
        }

        //require __DIR__ . '/../Views/showRecipe.php';
        return $this->twig->render('Recipe/Show.html.twig', ['recipe' => $recipe]);
    }

    function editRecipe(int $id): string
    {
        //  INIT 
        $errors = [];
        $datas = [];
        $maxLengthTitle = self::MAX_LENGTH_TITLE;
        $maxLengthDescription = self::MAX_LENGTH_DESCRIPTION;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // NETTOYAGE DES DONNEES
            $datas = array_map('trim', $_POST);
            // VALIDATION DES DONNEES
            $errors = $this->validateDatas($datas);

            if (count($errors) === 0) {
                //UDPATE RECIPE
                print_r('UPDATE');
                $this->recipeModel->edit($datas);
                header("Location: /");
                exit();
            }
        } else {
            //GET ICI
            // Input GET parameter validation (integer >0)
            $id = filter_var($id, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]);

            if (false === $id || null === $id) {
                header("Location: /");
                exit("Wrong input parameter");
            }

            $datas = $this->recipeModel->getById($id);
        }

        //require __DIR__ . '/../Views/addEditRecipe.php';
        return $this->twig->render('Recipe/Edit.html.twig', ['datas' => $datas, 'errors' => $errors]);
    }

    function deleteRecipe(): void
    {
        //  INIT
        $errors = [];
        $datas = [];
        $maxLengthTitle = self::MAX_LENGTH_TITLE;
        $maxLengthDescription = self::MAX_LENGTH_DESCRIPTION;

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Input GET parameter validation (integer >0)
            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]);
            if (false === $id || null === $id) {
                header("Location: /");
                exit("Wrong input parameter");
            }

            //  ON DELETE LA RECETTE SI ELLE EST TOUJOUR EN BASE
            $this->recipeModel->delete($id);

            //  ON AFFICHE LA LISTE DES RECETTES
            header("Location: /");
        }
    }
}
