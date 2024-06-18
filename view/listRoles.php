<?php ob_start(); ?>

<p> Il y a <?=$requete->rowCount() ?> rôles </p>

<table>
    <thead>
        <tr>

           <th>NOM</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($requete->fetchAll() as $role) { ?>
            <tr>
            <td><a href="index.php?action=detailRoles&id=<?=$role["id_role"]?>"><?= $role["nom_role"] ?></a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php

$titre = "Liste des rôles";
$titre_secondaire = "Liste des rôles";
$contenu = ob_get_clean();
require "view/template.php";