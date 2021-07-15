
<!-- ----- debut ControllerVaccin -->
<?php
require_once '../model/ModelStock.php';
require_once '../model/ModelCentre.php';
require_once '../model/ModelVaccin.php';
require_once '../model/ModelPatient.php';
require_once '../model/ModelRendezVous.php';

class ControllerRendezVous {
    // --- page d'acceuil
    public static function vaccinationAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewVaccinationAccueil.php';
        if (DEBUG)
            echo ("ControllerVaccination : vaccinationAccueil : vue = $vue");
        require ($vue);
    }

    // --- Liste des vaccins pour chaque centre
    public static function rendezVousReadId($args) {
        $results = ModelPatient::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $target = $args['target'];
        $vue = $root . '/app/view/rendezvous/viewId.php';
        if (DEBUG)
            echo ("ControllerRendezVous : rendezVousReadId : vue = $vue");
        require ($vue);
    }

    public static function rendezVousSituation() {
        $existence = ModelRendezVous::updateSituation(htmlspecialchars($_GET['id_patient']));

        if (strcmp($existence['existence'], '0') != 0){
            $injection_max = (int)$existence['infos']['injection_max'];
            $vaccin_doses = (int)$existence['infos']['vaccin_doses'];
//                Le cas N
            if ($injection_max >= $vaccin_doses){
                $results = ModelRendezVous::getVaccinsList(htmlspecialchars($_GET['id_patient']));
                $existence['affichage'] = 3;
            }
//                Le cas 1
            else {
                $results = ModelRendezVous::getPriseRendezVousNext($existence);
                $existence['affichage'] = 2;
            }
        }
//                Le cas 0
        else {
            $results = ModelRendezVous::getPriseRendezVous(htmlspecialchars($_GET['id_patient']));
                $existence['affichage'] = 1;
        }
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rendezvous/viewSituation.php';
        require ($vue);
    }

    public static function rendezVousTaken() {
        $results = ModelRendezVous::updateRDV(htmlspecialchars($_GET['id_patient']), htmlspecialchars($_GET['id_vaccin']),htmlspecialchars($_GET['id_centre']));
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rendezvous/viewUpdated.php';
        require ($vue);
    }

    public static function rendezVousBegin() {
        $results = ModelRendezVous::updateFirstRDV(htmlspecialchars($_GET['id_patient']),htmlspecialchars($_GET['id_centre']));
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/rendezvous/viewBegin.php';
        require ($vue);
    }

}
?>
<!-- ----- fin ControllerVaccin -->


