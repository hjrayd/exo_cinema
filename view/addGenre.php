<?php 

ob_start(); 
?>


        <form action="index.php?action=addGenre" method="post">
            <p>
                <label>
                    Nom du genre :
                    <input type="text" name="nom_genre">
                </label>
            </p>
            <p >
                <input class="btn" type="submit" name="submit" value="Ajouter le genre">
            </p>

        </form>

<?php

$titre = "Ajouter un genre";
$titre_secondaire = "Ajouter un genre";
$contenu = ob_get_clean();
require "template.php";