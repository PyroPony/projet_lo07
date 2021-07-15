
<!-- ----- debut ControllerVin -->
<?php

class ControllerVaccination {
    // --- page d'acceuil
    public static function vaccinationAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewVaccinationAccueil.php';
        if (DEBUG)
            echo ("ControllerVaccination : vaccinationAccueil : vue = $vue");
        require ($vue);
    }

    // --- Liste des régions sans doublons
    public static function mesPropositions() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/public/documentation/pointDeVueProjet.php';
        if (DEBUG)
            echo ("ControllerVaccination : mesPropositions : vue = $vue");
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerVin -->


