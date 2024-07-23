<?php 

ob_start(); 
?>

        <form action="index.php?action=addRole" method="post">
            <p> Informations du rôle: <br> 
            
                <label>
                    Nom du rôle:
                    <input type="text" name="nom_role">
                </label>
            </p>
            
            <p>
                <input class="btn" type="submit" name="submit" value="Ajouter le rôle">
            </p>

        </form>

<?php

$titre = "Ajouter un rôle";
$titre_secondaire = "Ajouter un rôle";
$contenu = ob_get_clean();
require "template.php";