
<!-- ----- début viewId -->
<?php
require ($root . '/app/view/fragment/fragmentVaccinationHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
    include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';

        if($existence['affichage'] == 3){
            echo ("<H3>Liste des vaccins reçus :</H3>");
            echo ("<table class = 'table table-striped table-bordered'>");
            echo ("<thead><tr>");
            foreach ($results[0] as $name){
                printf("<th>%s</th>", $name);
            }
            echo ("</tr></thead>");
            echo  "<tbody>";
            foreach ($results[1] as $row){
                echo ("<tr class=''>");
                foreach ($row as $data){
                    printf("<td>%s</td>", $data);
                }
                echo ("</tr>");
            }
            echo ("</tbody></table>");
        }
        elseif (!empty($results)){
            if ($existence['affichage'] == 2 ) {
                $target = 'rendezVousTaken';
            } else if ($existence['affichage'] == 1 ) {
                $target = 'rendezVousBegin';
            }
            echo ("<H3>Selection du centre l'injection :</H3>");
            echo ("<form role='form' method='get' action='router2.php'>");
            echo ("<div class='form-group'>");
            echo ("<input type='hidden' name='action' value='". $target ."'>");
            echo ("<input type='hidden' name='id_patient' value=". $_GET['id_patient'].">");
            if ($existence['affichage'] == 2 ){echo ("<input type='hidden' name='id_vaccin' value=". $existence['infos']['vaccin_id'].">");}
            echo ("<label for='id_centre'>Selectionnez le centre : </label><select class='form-control' id='id_centre' name='id_centre' style='width: 250px'>");
                foreach ($results as $element) {
                    echo ("<option value='". $element['centre_id']."' >");
                    echo implode(" : ", $element);
                    echo ("</option>");
                }
            echo ("</select>");
            echo ("</div>");
            echo ("<p/>");
            echo ("<button class='btn btn-primary' type='submit'>Go</button>");
            echo ("</form>");
        } else {
            echo ("<H3>Aucun centre disponible pour l'injection</H3>");
        }
    ?>

</div>

<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewId -->