
<!-- ----- debut ModelVin -->

<?php
require_once 'Model.php';
require_once 'ModelCentre.php';

class ModelRendezVous {
    private $patient_id, $centre_id, $vaccin_id, $injection;

    // pas possible d'avoir 2 constructeurs
    public function __construct($centre_id = NULL, $patient_id = NULL, $vaccin_id = NULL, $injection = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($centre_id) || !is_null($patient_id) || !is_null($vaccin_id)) {
            $this->centre_id = $centre_id;
            $this->patient_id = $patient_id;
            $this->vaccin_id = $vaccin_id;
            $this->injection = $injection;
        }
    }

    function setCentreId($centre_id) {
        $this->centre_id = $centre_id;
    }

    function setPatientId($patient_id) {
        $this->patient_id = $patient_id;
    }

    function setVaccinId($vaccin_id) {
        $this->vaccin_id = $vaccin_id;
    }

    function setInjection($injection) {
        $this->injection = $injection;
    }

    function getCentreId() {
        return $this->centre_id;
    }

    function getPatientId() {
        return $this->patient_id;
    }

    function getVaccinId() {
        return $this->vaccin_id;
    }

    function getInjection() {
        return $this->injection;
    }

    public static function getAllVaccinsByCentre() {
        try {
            $database = Model::getInstance();
            $query = "SELECT vaccin.label AS vaccin_label, centre.label as centre_label, quantite
                      FROM stock, vaccin, centre
                      WHERE centre_id = centre.id AND vaccin_id = vaccin.id
                      ORDER BY centre.label";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function updateSituation($id_patient) {
        try {
            $database = Model::getInstance();

            $query = "select exists(select * from rendezvous where   patient_id = :id_patient)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id_patient' => $id_patient,
            ]);
            $results['existence'] = $statement->fetch(PDO::FETCH_COLUMN, 0);

            if (strcmp($results['existence'],'0') != 0){
                $query = "SELECT MAX(injection) as injection_max, centre_id, vaccin_id FROM rendezvous WHERE patient_id = :id_patient";
                $statement = $database->prepare($query);
                $statement->execute([
                    'id_patient' => $id_patient,
                ]);
                $results['infos'] = $statement->fetch(PDO::FETCH_ASSOC);

                $query = "select vaccin.doses from vaccin where id = :id_vaccin";
                $statement = $database->prepare($query);
                $statement->execute([
                    'id_vaccin' => $results['infos']['vaccin_id']
                ]);

                $results['infos']['vaccin_doses'] = $statement->fetch(PDO::FETCH_COLUMN, 0);
            }

            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function getVaccinsList($id_patient) {
        try {
            $database = Model::getInstance();

            $query = "SELECT vaccin.label as vaccin_label, injection, centre.label  as centr_label
                      FROM vaccin, centre, rendezvous
                      WHERE patient_id = :id_patient AND vaccin_id = vaccin.id AND centre_id = centre.id
                      ORDER BY injection";
            $statement = $database->prepare($query);
            $statement->execute([
                'id_patient' => $id_patient,
            ]);
            for ($i=0; $i < $statement->columnCount(); $i++){
                $cols[$i] = $statement->getColumnMeta($i)['name'];
            }
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
                $datas[] = $row;
            }
            return array($cols, $datas);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function getPriseRendezVousNext(array $infos){
        try {
            $database = Model::getInstance();

            $query = "SELECT centre_id, centre.label
                      FROM stock, vaccin, centre
                      WHERE centre_id = centre.id AND vaccin_id = vaccin.id AND stock.quantite > 0 AND stock.vaccin_id = :vaccin_id";
            $statement = $database->prepare($query);
            $statement->execute([
                'vaccin_id' => $infos['infos']['vaccin_id'],
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function getPriseRendezVous($id_patient){
        try {
            $database = Model::getInstance();

            $query = "SELECT DISTINCT centre_id, centre.label
                      FROM stock, centre
                      WHERE centre_id = centre.id AND stock.quantite > 0";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function updateFirstRDV($id_patient, $id_centre){
        try {
            $database = Model::getInstance();

            $query = "SELECT vaccin_id, quantite
                      FROM stock
                      WHERE centre_id = 1
                      ORDER BY quantite DESC";
            $statement = $database->prepare($query);
            $statement->execute([
                    'centre_id' => $id_centre,
            ]);
            $results = $statement->fetch(PDO::FETCH_ASSOC);
            $id_vaccin =  $results['vaccin_id'];

            $query = "insert into rendezvous value (:id_centre, :id_patient, 1,:id_vaccin)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id_patient' => $id_patient,
                'id_centre' => $id_centre,
                'id_vaccin' => $id_vaccin,
            ]);

            $query = "SELECT quantite FROM stock WHERE vaccin_id = :id_vaccin AND centre_id = :id_centre";
            $statement = $database->prepare($query);
            $statement->execute([
                'id_vaccin' => $id_vaccin,
                'id_centre' => $id_centre   ]);
            $tuple = $statement->fetch();
            $quantite = $tuple[0];
            $quantite--;

            $query = "update stock set quantite = :quantity where centre_id = :id_centre and vaccin_id = :id_vaccin";
            $statement = $database->prepare(    $query);
            $statement->execute([
                'id_vaccin' => $id_vaccin,
                'id_centre' => $id_centre,
                'quantity' => $quantite,
            ]);

            return array($quantite, $id_vaccin);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function updateRDV($id_patient, $id_vaccin, $id_centre){
        try {
            $database = Model::getInstance();

            $query = "SELECT MAX(injection) as injection_max FROM rendezvous WHERE patient_id = :id_patient";
            $statement = $database->prepare($query);
            $statement->execute(['id_patient' => $id_patient]);
            $tuple = $statement->fetch();
            $max_injection = $tuple['injection_max'];
            $max_injection++;

            $query = "insert into rendezvous value (:id_centre, :id_patient, :max_injection,:id_vaccin)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id_patient' => $id_patient,
                'id_centre' => $id_centre,
                'id_vaccin' => $id_vaccin,
                'max_injection' => $max_injection,
            ]);

            $query = "SELECT quantite FROM stock WHERE vaccin_id = :id_vaccin AND centre_id = :id_centre";
            $statement = $database->prepare($query);
            $statement->execute([
                    'id_vaccin' => $id_vaccin,
                    'id_centre' => $id_centre   ]);
            $tuple = $statement->fetch();
            $quantite = $tuple[0];
            $quantite--;

            $query = "update stock set quantite = :quantity where centre_id = :id_centre and vaccin_id = :id_vaccin";
            $statement = $database->prepare(    $query);
            $statement->execute([
                'id_vaccin' => $id_vaccin,
                'id_centre' => $id_centre,
                'quantity' => $quantite,
            ]);

            return array($max_injection, $quantite);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

}
?>
<!-- ----- fin ModelVaccin -->
