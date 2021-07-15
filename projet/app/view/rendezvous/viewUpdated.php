
<!-- ----- début viewId -->
<?php
require ($root . '/app/view/fragment/fragmentVaccinationHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
    include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';

    if ($results != -1) {
    echo ("<h3>Le RDV a été pris et le dossier patient mis à jour : </h3>");
    echo("<ul>");
        echo ("<li>quantite = " . $results[1] . "</li>");
        echo ("<li>injection = " . $results[0] . "</li>");
        echo ("<li>id_patient = " . $_GET['id_patient'] . "</li>");
        echo ("<li>id_vaccin = " . $_GET['id_vaccin'] . "</li>");
        echo ("<li>id_centre = " . $_GET['id_centre'] . "</li>");
        echo("</ul>");
    } else {
    echo ("<h3>Problème d'update du RDV et du Patient</h3>");
        echo ("<li>id_patient = " . $_GET['id_patient'] . "</li>");
        echo ("<li>id_vaccin = " . $_GET['id_vaccin'] . "</li>");
        echo ("<li>id_centre = " . $_GET['id_centre'] . "</li>");
    }
    ?>
</div>

<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewId -->