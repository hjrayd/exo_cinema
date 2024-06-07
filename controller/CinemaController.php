<?php
    namespace Controller;
    use Model\Connect;

    class CinemaController {
        /*On liste les films*/
        public function listFilms() {
            $pdo = Connect::seConnecter();
            $requete = $pdo->query("
            SELECT titre, date_sortie
            FROM film
            ");

            require "viex/listFilms.php";
        }
    }
?>