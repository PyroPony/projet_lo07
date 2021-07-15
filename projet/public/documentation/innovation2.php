<!-- ----- début Innovation2 -->
<?php

require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
    ?>
    <!--    <pre>--><?php //print_r($results)?><!--</pre>-->
    <div class="jumbotron">
        <h2>Innovation 2 : affichage des dossiers de vaccination des patients</h2>
        <p><em>visualiser les informations d'injections des patients</em></p>
    </div>
    <?php
    $taille_dossier = $results['max_injection']*80 + 150 ;
    foreach ($results['id'] as $patient){
        echo "<div class='panel panel-primary col-lg-4 col-sm-4 col-xs-4 col-md-4' style='height: ". $taille_dossier ."px'>";
        echo "<div class='panel panel-heading'>";
        echo $patient['nom'] ." ". $patient['prenom'];
        echo "</div>";
        echo "<div class='panel-body'>";
        if (count($results['patient'][$patient['id']]) != 0){
            echo "Injection(s) faite(s) :";
            echo "<ul>";
            foreach ($results['patient'][$patient['id']] as $injection){
                echo "<li>Centre : ". $injection['centre_label'] ." | Vaccin : ". $injection['vaccin_label'] ."</li>";
            }
            echo "</ul>";
            echo "Avancée de la vaccination : ";
            echo "<div class='progress'>";
            echo "<div class='progress-bar' role='progressbar' aria-valuenow='". $results['patient'][$patient['id']][count($results['patient'][$patient['id']])-1]['injection']/$results['patient'][$patient['id']][0]['doses'] ."' aria-valuemin='0' aria-valuemax='100' 
            style='width: ". $results['patient'][$patient['id']][count($results['patient'][$patient['id']])-1]['injection']/$results['patient'][$patient['id']][0]['doses']*100 ."%;'>";
            echo "</div></div>";
            echo "Soit :";
            echo "<ul>";
            echo "<li><span class='badge'>". $results['patient'][$patient['id']][count($results['patient'][$patient['id']])-1]['injection'] ."</span>  Dose(s) reçue(s) </li>";
            echo "<li><span class='badge'>". $results['patient'][$patient['id']][0]['doses'] ."</span>  Dose(s) nécessaire(s) </li>";
            echo "</ul>";

        } else {
            echo "Injection(s) faite(s) :<br>";
            echo " <ul><li>Aucunes</li></ul>";
            echo "Avancée de la vaccination :";

            echo "<div class='progress'>";
            echo "<div class='progress-bar' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100' style='width: 0;'>";
            echo "</div></div>";
            echo "Soit :";
            echo "<ul>";
            echo "<li><span class='badge'>0</span>  Dose(s) reçue(s) </li>";
            echo "</ul>";
        }
        echo "</div></div>";
    }
    ?>


</div>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin Innovation2 -->


