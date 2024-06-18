<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style.css">
    <title><?= $titre ?></title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php?action=listFilms">Films</a></li>
            <li><a href="index.php?action=listActeurs">Acteurs</a></li>
            <li><a href="index.php?action=listRealisateurs">Realisateurs</a></li>
            <li><a href="index.php?action=listGenres">Genres</a></li>
            <li><a href="index.php?action=listRoles">Rôles</a></li>
            <li><a href="index.php?action=addActeur">Ajouter un acteur</a></li>
            <li><a href="index.php?action=addRole">Ajouter un rôle</a></li>
            <li><a href="index.php?action=addGenre">Ajouter un genre</a></li>
        </ul>
    </nav>

    <main>
        <h1>Accueil</h1>
        <h2><?= $titre_secondaire ?></h2>
        <?= $contenu ?>
    </main>
</body>
</html>