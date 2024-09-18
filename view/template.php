<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title><?= $titre ?></title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php?action=accueil">Accueil</a></li>
            <li><a href="index.php?action=listFilms">Films</a></li>
            <li><a href="index.php?action=listActeurs">Acteurs</a></li>
            <li><a href="index.php?action=listRealisateurs">Réalisateurs</a></li>
            <li><a href="index.php?action=listGenres">Genres</a></li>
            <li><a href="index.php?action=listRoles">Rôles</a></li>
           
        </ul>
    </nav>

    <main>
        
        <h2><?= $titre_secondaire ?></h2>
        <?= $contenu ?>
    </main>
</body>

</html>