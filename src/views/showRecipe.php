<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $recipe['title'] ?></title>
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/cards.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/error.css" type="text/css">
</head>

<body>
    <main>
        <?php include 'showErrors.php'; ?>
        <section class="show-card">
            <article class="card">
                <header>
                    <h1><?= htmlentities($recipe['title']); ?></h1>
                </header>
                <div class="card-main">
                    <?= htmlentities($recipe['description']); ?>
                </div>

                <div class="container-button">
                    <a href="/" class="link-button home">Home
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                        </svg>
                    </a>
                </div>

            </article>
        </section>
    </main>
</body>

</html>