
<!-- ----- debut ModelVin -->

<?php
require_once 'Model.php';
class ModelCovid {

    public function __construct() {

    }

    public static function getAll() {
        try {
            $results[1] = self::graph1();
            $results[2] = self::graph2();
            $results[3] = self::graph3();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function graph1() {
        try {
            $database = Model::getInstance();
            $query = " SELECT centre.label, SUM(stock.quantite) AS 'doses'
                        FROM stock, centre
                        WHERE centre_id = centre.id
                        GROUP BY centre.label
                        ORDER BY doses DESC";
            $statement = $database->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function graph2() {
        try {
            $database = Model::getInstance();
            $query = " SELECT label, quantite
                       FROM stock, vaccin
                       WHERE vaccin_id = vaccin.id
                       GROUP BY vaccin.label
                       ORDER BY quantite DESC";
            $statement = $database->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function graph3() {
        try {
            $database = Model::getInstance();
            $query = "SELECT patient.adresse, max(injection) as doses
                      FROM rendezvous, patient
                      WHERE patient_id = patient.id
                      GROUP BY adresse
                      ORDER BY doses DESC ";
            $statement = $database->prepare($query);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getDossierVaccination() {
        try {
            $database = Model::getInstance();
            $query = "SELECT *
                      FROM patient";
            $statement = $database->prepare($query);
            $statement->execute();
            $results["id"] = $statement->fetchAll(PDO::FETCH_ASSOC);

            $database = Model::getInstance();
            $query = "SELECT max(injection) as max_injection
                      FROM rendezvous";
            $statement = $database->prepare($query);
            $statement->execute();
            $results["max_injection"] = $statement->fetch(PDO::FETCH_COLUMN, 0);

            foreach ($results["id"] as $patient){
                $query = "SELECT vaccin.label as vaccin_label, injection, centre.label  as centre_label, vaccin.doses
                        FROM vaccin, centre, rendezvous
                        WHERE patient_id = :id_patient AND vaccin_id = vaccin.id AND centre_id = centre.id
                        ORDER BY injection";
                $statement = $database->prepare($query);
                $statement->execute([
                    'id_patient' => $patient['id'],
                ]);
                $results["patient"][$patient['id']] = $statement->fetchAll(PDO::FETCH_ASSOC);
            }
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getAllLocalisation() {
        try {
            $database = Model::getInstance();
            $query = "select adresse from patient";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function getLocalisation($adresse, $bool) {
        try {
            $database = Model::getInstance();
            if ($bool == 0){
                $query = "select DISTINCT id, nom, prenom  from patient,rendezvous where adresse = :adresse AND patient_id = patient.id";
            } else {
                $query = "select * from patient where adresse = :adresse";
            }

            $statement = $database->prepare($query);
            $statement->execute([
                    'adresse' => $adresse,
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

}
?>
<!-- ----- fin ModelVaccin -->
