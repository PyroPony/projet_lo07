
<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelVaccin.php';

class ControllerVaccin {
    // --- page d'acceuil
    public static function vaccinationAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewVaccinationAccueil.php';
        if (DEBUG)
            echo ("ControllerVaccination : vaccinationAccueil : vue = $vue");
        require ($vue);
    }

    // --- Liste des vaccins
    public static function vaccinReadAll() {
        $results = ModelVaccin::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewAll.php';
        if (DEBUG)
            echo ("ControllerVaccin : vaccinReadAll : vue = $vue");
        require ($vue);
    }

    // Affiche le formulaire de creation d'un producteur
    public static function vaccinCreate() {
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewInsert.php';
        require ($vue);
    }

    // La clé est gérée par le systeme et pas par l'internaute
    public static function vaccinCreated() {
        // ajouter une validation des informations du formulaire
        $results = ModelVaccin::insert(htmlspecialchars($_GET['label']), htmlspecialchars($_GET['doses']));
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewInserted.php';
        require ($vue);
    }

    public static function vaccinReadId($args) {
        $results = ModelVaccin::getAllId();

        $target = $args['target'];
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewId.php';
        require ($vue);
    }

    public static function vaccinAdd() {
        $results = ModelVaccin::add(htmlspecialchars($_GET['id_vaccin']), htmlspecialchars($_GET['doses']));

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/vaccin/viewUpdated.php';
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerVaccin -->


