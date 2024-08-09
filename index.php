<?php

use Controller\CinemaController;

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$ctrlCinema = new CinemaController();
$id = (isset($_GET["id"])) ? $_GET["id"] : null;

if(isset($_GET["action"])) {
    switch ($_GET["action"]) {
        case "accueil" : $ctrlCinema->accueil(); break;
        case "listFilms" : $ctrlCinema->listFilms(); break;
        case "listActeurs" : $ctrlCinema->listActeurs(); break;
        case "listRealisateurs" : $ctrlCinema->listRealisateurs(); break;
        case "listGenres" : $ctrlCinema->listGenres(); break;
        case "listRoles" : $ctrlCinema->listRoles(); break;
        case "detailFilm" : $ctrlCinema->detailFilm($id); break;
        case "detailRealisateurs" : $ctrlCinema->detailRealisateurs($id); break;
        case "detailActeurs" : $ctrlCinema->detailActeurs($id); break;
        case "detailRoles" : $ctrlCinema->detailRoles($id); break;
        case "detailGenre" : $ctrlCinema->detailGenre($id); break;
        case "addActeur" : $ctrlCinema->addActeur(); break;
        case "addRole" : $ctrlCinema->addRole(); break;
        case "addGenre" : $ctrlCinema->addGenre(); break;
        case "addFilm" : $ctrlCinema->addFilm(); break;
    }
    
} else {
    $ctrlCinema->accueil(); 
}
?>