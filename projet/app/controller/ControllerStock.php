
<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelStock.php';
require_once '../model/ModelCentre.php';
require_once '../model/ModelVaccin.php';

class ControllerStock {
    // --- page d'acceuil
    public static function vaccinationAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewVaccinationAccueil.php';
        if (DEBUG)
            echo ("ControllerVaccination : vaccinationAccueil : vue = $vue");
        require ($vue);
    }

    // --- Liste des vaccins pour chaque centre
    public static function stockReadAllByCentre() {
        $results = ModelStock::getAllVaccinsByCentre();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewAll.php';
        if (DEBUG)
            echo ("ControllerStock : vaccinReadAllByCentre : vue = $vue");
        require ($vue);
    }

    // --- Liste des doses pour chaque centre
    public static function stockReadQuantitelByCentre() {
        $results = ModelStock::getQuantityByCentre();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewGlobal.php';
        if (DEBUG)
            echo ("ControllerStock : vaccinReadQuantitelByCentre : vue = $vue");
        require ($vue);
    }

    // --- Ajout de vaccin par centre
    public static function stockAttributionByCentre() {
        $results = ModelCentre::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/attribution.php';
        if (DEBUG)
            echo ("ControllerStock : vaccinReadQuantitelByCentre : vue = $vue");
        require ($vue);
    }

    public static function stockReadId($args) {
        $results['vaccin'] = ModelVaccin::getAll();
        $results['centre'] = ModelCentre::getAll();

        $target = $args['target'];
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewId.php';
        require ($vue);
    }

    public static function stockAdd() {
        $i = 1;
        while (isset($_GET[$i])){
            $vaccins[$i] = htmlspecialchars($_GET[$i]);
            $i++;
        }
        $results = ModelStock::add($vaccins, htmlspecialchars($_GET['id_centre']));

        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/stock/viewUpdated.php';
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerVaccin -->


