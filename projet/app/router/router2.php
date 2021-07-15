
<!-- ----- debut Router1 -->
<?php

require ('../controller/ControllerVaccination.php');
require ('../controller/ControllerVaccin.php');
require ('../controller/ControllerCentre.php');
require ('../controller/ControllerPatient.php');
require ('../controller/ControllerStock.php');
require ('../controller/ControllerRendezVous.php');
require('../controller/ControllerCovid.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// --- On supprime l'élément action de la structure

unset($param['action']);

// --- Tout ce qui reste sont des arguments
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
    case "vaccinReadAll" :
    case "vaccinReadId" :
    case "vaccinCreate" :
    case "vaccinCreated" :
    case "vaccinAdd" :
        ControllerVaccin::$action($args);
    break;

    case "centreReadAll" :
    case "centreCreate" :
    case "centreCreated" :
        ControllerCentre::$action($args);
        break;

    case "patientReadAll" :
    case "patientCreate" :
    case "patientCreated" :
        ControllerPatient::$action($args);
        break;

    case "stockReadAllByCentre" :
    case "stockReadQuantitelByCentre" :
    case "stockReadId" :
    case "stockAdd" :
        ControllerStock::$action($args);
        break;

    case "rendezVousReadId" :
    case "rendezVousSituation" :
    case "rendezVousTaken" :
    case "rendezVousBegin" :
        ControllerRendezVous::$action($args);
        break;

    case "pointDeVueProjet" :
    case "innovation1" :
    case "innovation2" :
    case "innovation3" :
    case "docInnovation1" :
    case "docInnovation2" :
    case "docInnovation3" :
    case "innovationReadLocalisation" :
        ControllerCovid::$action($args);
        break;

 // Tache par défaut
 default:
  $action = "VaccinationAccueil";
  ControllerVaccination::$action();
}
?>
<!-- ----- Fin Router1 --->

