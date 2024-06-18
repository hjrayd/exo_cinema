<?php ob_start();
foreach($requeteRole->fetchAll() as $roles){}?>

<table>
<thead>
        <tr>
            <th>Acteur</th>
            <th>Film</th>
            <th>Année de sortie</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($requeteRoles->fetchAll() as $roles){ ?>
                <tr>
                    <td> <a href="index.php?action=detailActeurs&id=<?=$roles["id_acteur"]?>"><?= $roles["prenom_personne"]?><?= $roles["nom_personne"]?></a></td>
                    <td><a href="index.php?action=detailFilm&id=<?=$roles["id_film"]?>"><?= $roles["titre"]?></a></td>
                    <td><?= $roles["date_sortie"]?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php
$titre = "Détail de l'acteur";
$titre_secondaire = "Détail de l'acteur";
$contenu = ob_get_clean();
require "view/template.php";