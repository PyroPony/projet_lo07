
<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelPatient.php';

class ControllerPatient {
    // --- page d'acceuil
    public static function vaccinationAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewVaccinationAccueil.php';
        if (DEBUG)
            echo ("ControllerVaccination : vaccinationAccueil : vue = $vue");
        require ($vue);
    }

    // --- Liste des centres
    public static function patientReadAll() {
        $results = ModelPatient::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewAll.php';
        if (DEBUG)
            echo ("ControllerPatient : patientReadAll : vue = $vue");
        require ($vue);
    }

    // Affiche le formulaire de creation d'un producteur
    public static function patientCreate() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInsert.php';
        require ($vue);
    }

    // La clé est gérée par le systeme et pas par l'internaute
    public static function patientCreated() {
        // ajouter une validation des informations du formulaire
        $results = ModelPatient::insert(htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['adresse']));
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/patient/viewInserted.php';
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerVaccin -->


