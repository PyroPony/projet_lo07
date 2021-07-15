
<!-- ----- debut ControllerCovid -->
<?php
require_once '../model/ModelCovid.php';

class ControllerCovid {

    // --- page d'acceuil
    public static function vaccinationAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewVaccinationAccueil.php';
        if (DEBUG)
            echo ("ControllerVaccination : vaccinationAccueil : vue = $vue");
        require ($vue);
    }

    public static function pointDeVueProjet() {


        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/public/documentation/pointDeVueProjet.php';
        if (DEBUG)
            echo ("ControllerCave : pointDeVueProjet : vue = $vue");
        require ($vue);
    }

    public static function innovation1() {
        $results = ModelCovid::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/public/documentation/innovation1.php';
        if (DEBUG)
            echo ("ControllerCave : innovation1 : vue = $vue");
        require ($vue);
    }

    public static function innovation2() {
        // ----- Construction chemin de la vue
        $results = ModelCovid::getDossierVaccination();
        include 'config.php';
        $vue = $root . '/public/documentation/innovation2.php';
        if (DEBUG)
            echo ("ControllerCave : innovation2 : vue = $vue");
        require ($vue);
    }

    public static function innovation3() {
        $results = ModelCovid::getAllLocalisation();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/public/documentation/innovation3.php';
        if (DEBUG)
            echo ("ControllerCave : innovation3 : vue = $vue");
        require ($vue);
    }

    public static function innovationReadLocalisation() {
        $bool = $_GET['bool'];
        $results = ModelCovid::getLocalisation(htmlspecialchars($_GET['adresse']), $bool);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/public/documentation/innovationViewLocalisation.php';
        if (DEBUG)
            echo ("ControllerCave : innovation3 : vue = $vue");
        require ($vue);
    }

    public static function docInnovation1() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/public/documentation/docInnovation1.php';
        if (DEBUG)
            echo ("ControllerCave : docInnovation1 : vue = $vue");
        require ($vue);
    }

    public static function docInnovation2() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/public/documentation/docInnovation2.php';
        if (DEBUG)
            echo ("ControllerCave : docInnovation2 : vue = $vue");
        require ($vue);
    }

    public static function docInnovation3() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/public/documentation/docInnovation3.php';
        if (DEBUG)
            echo ("ControllerCave : docInnovation3 : vue = $vue");
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerCovid -->


