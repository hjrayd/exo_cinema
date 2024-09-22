<?php 

ob_start(); 
?>
    <div class="form-action">
        <form action="index.php?action=addRole" method="post">
            <p class="titre-form"> Informations du rôle: </p><br> 
            
                <label>
                    Nom du rôle:
                    <input type="text" name="nom_role">
                </label>
            
            <div class="btn-input">
            <p>
                <input class="btn" type="submit" name="submit" value="Ajouter le rôle">
            </p>
</div>
        </form>
</div>
<?php

$titre = "Ajouter un rôle";
$titre_secondaire = "Ajouter un rôle";
$contenu = ob_get_clean();
require "template.php";