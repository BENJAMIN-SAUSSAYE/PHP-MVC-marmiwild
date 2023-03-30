<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create One Recipe</title>
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/cards.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/form.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/error.css" type="text/css">
</head>

<body>
    <main>
        <section class="form-container">
            <h1>Create Recipe</h1>
            <form method="post" action="">
                <?php include 'showErrors.php'; ?>
                <div>
                    <label for="title">Titre :</label>
                    <input type="text" id="title" name="title" value="<?= $datas['title'] ?? ''; ?>" maxlength="<?= $maxLengthTitle ?>" required>
                </div>
                <div>
                    <label for="description">description :</label>
                    <textarea id="description" name="description" cols="30" rows="10" required><?= $datas['description'] ?? ''; ?></textarea>
                </div>
                <div class="container-button">
                    <button type="submit">Ajouter
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                    </button>

                    <a href="/" class="link-button home">Home
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                        </svg>
                    </a>
                </div>
            </form>
        </section>
    </main>
</body>

</html>