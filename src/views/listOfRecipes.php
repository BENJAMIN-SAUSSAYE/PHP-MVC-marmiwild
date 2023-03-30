<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/cards.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/error.css" type="text/css">
    <title>List of Recipes</title>
</head>

<body>
    <main>
        <p><?php include 'showErrors.php'; ?></p>
        <div class="container-button head">
            <a href="/add" class="link-button">Add
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
            </a>
        </div>
        <header>
            <h1>List Of Recipes</h1>
        </header>
        <section class="cards">
            <?php foreach ($recipes as $recipe) : ?>
                <article class="card">
                    <header>
                        <h2><?= htmlentities($recipe['title']); ?></h2>
                    </header>
                    <div class="card-main">

                    </div>
                    <footer>
                        <a href="show?id=<?= htmlentities($recipe['id']); ?>" class="link-button">Show
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link" viewBox="0 0 16 16">
                                <path d="M6.354 5.5H4a3 3 0 0 0 0 6h3a3 3 0 0 0 2.83-4H9c-.086 0-.17.01-.25.031A2 2 0 0 1 7 10.5H4a2 2 0 1 1 0-4h1.535c.218-.376.495-.714.82-1z" />
                                <path d="M9 5.5a3 3 0 0 0-2.83 4h1.098A2 2 0 0 1 9 6.5h3a2 2 0 1 1 0 4h-1.535a4.02 4.02 0 0 1-.82 1H12a3 3 0 1 0 0-6H9z" />
                            </svg>
                        </a>
                    </footer>
                </article>
            <?php endforeach ?>
        </section>
    </main>
</body>

</html>