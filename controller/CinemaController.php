<?php
    namespace Controller;
    use Model\Connect;

    class CinemaController {
        public function listFilms() {
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("
            SELECT titre, date_sortie
            FROM film
            ");

            require "view/listFilms.php";
        }

        public function listActeurs() {
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("
           SELECT nom_personne, prenom_personne
            FROM personne
            INNER JOIN acteur ON personne.id_personne = acteur.id_personne;
            ");

            require "view/lisActeurs.php";
        }
    }
?>


