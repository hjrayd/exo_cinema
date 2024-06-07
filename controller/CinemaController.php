<?php
    namespace Controller;
    use Model\Connect;

    class CinemaController {
        public function listFilms() {
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("SELECT titre, date_sortie FROM film");

            require "view/listFilms.php";
        }

        public function listActeurs() {
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("
           SELECT nom_personne, prenom_personne
            FROM personne
            INNER JOIN acteur ON personne.id_personne = acteur.id_personne;
            ");

            require "view/listActeurs.php";
        }

        public function listRealisateurs() {
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("
           SELECT nom_personne, prenom_personne
            FROM personne
            INNER JOIN realisateur ON personne.id_personne = realisateur.id_personne;
            ");

            require "view/listRealisateurs.php";
        }

        public function listGenres() {
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("
           SELECT nom_genre
            FROM genre
            ");

            require "view/listGenres.php";
        }

        public function listRoles() {
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("
         SELECT nom_role
        FROM role
        INNER JOIN casting ON role.id_role = casting.id_role
            ");

            require "view/listRoles.php";
        }

    }
?>


