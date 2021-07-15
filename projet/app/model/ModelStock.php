
<!-- ----- debut ModelVin -->

<?php
require_once 'Model.php';

class ModelStock {
    private $vaccin_id, $centre_id, $quantite;

    // pas possible d'avoir 2 constructeurs
    public function __construct($centre_id = NULL, $vaccin_id = NULL, $quantite = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($centre_id) || !is_null($vaccin_id)) {
            $this->centre_id = $centre_id;
            $this->vaccin_id = $vaccin_id;
            $this->quantite = $quantite;
        }
    }

    function setCentreId($centre_id) {
        $this->centre_id = $centre_id;
    }

    function setVaccinId($vaccin_id) {
        $this->vaccin_id = $vaccin_id;
    }

    function setQuantite($quantite) {
        $this->quantite = $quantite;
    }

    function getCentreId() {
        return $this->centre_id;
    }

    function getVaccinId() {
        return $this->vaccin_id;
    }

    function getQuantite() {
        return $this->quantite;
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

    public static function getQuantityByCentre() {
        try {
            $database = Model::getInstance();
            $query = "Select *
                      from (
                          SELECT centre.label, SUM(stock.quantite) AS 'doses'
                          FROM stock, centre
                          WHERE centre_id = centre.id
                          GROUP BY centre.label) a
                      order by doses DESC ";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    public static function add(array $qantiteVaccins, $id_centre) {
        try {
            $database = Model::getInstance();

            foreach ($qantiteVaccins as $id_vaccin => $quantite){
                if ($quantite != '0'){
                        //Recherche existence tuple

                    $query = "select exists(select * from stock where centre_id = :id_centre and vaccin_id = :id_vaccin)";
                    $statement = $database->prepare($query);
                    $statement->execute([
                        'id_centre' => $id_centre,
                        'id_vaccin' => $id_vaccin,
                    ]);
                    $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);

                    // modif tuple existant
                    if ($results[0] == 1){
                        $query = "select quantite from stock where vaccin_id = :id_vaccin and centre_id = :id_centre";
                        $statement = $database->prepare($query);
                        $statement->execute([
                            'id_vaccin' => $id_vaccin,
                            'id_centre' => $id_centre,
                        ]);
                        $resultat = $statement->fetch(PDO::FETCH_ASSOC);

                        $quantite += $resultat['quantite'];

                        $query = "update stock set quantite = :quantite where vaccin_id = :id_vaccin and centre_id = :id_centre";
                        $statement = $database->prepare($query);
                        $statement->execute([
                            'id_vaccin' => $id_vaccin,
                            'id_centre' => $id_centre,
                            'quantite' => $quantite,
                        ]);
                    }

                    // ajout d'un nouveau tuple;
                    if ($results[0] == 0){
                        $query = "insert into stock value (:id_centre, :id_vaccin, :quantite)";
                        $statement = $database->prepare($query);
                        $statement->execute([
                            'id_vaccin' => $id_vaccin,
                            'id_centre' => $id_centre,
                            'quantite' => $quantite,
                        ]);
                    }
                }
            }

            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

}
?>
<!-- ----- fin ModelVaccin -->
