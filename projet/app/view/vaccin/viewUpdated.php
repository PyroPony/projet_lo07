
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentVaccinationHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
    include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if ($results != -1) {
        echo ("<h3>La mise à jour du vaccin a été faite </h3>");
        echo("<ul>");
        echo ("<li>id = " . $_GET['id_vaccin'] . "</li>");
        echo ("<li>doses = " . $_GET['doses'] . "</li>");
        echo("</ul>");
    } else {
        echo ("<h3>Problème d'update du Vaccin</h3>");
        echo ("id = " . $results);
    }

    echo("</div>");

    include $root . '/app/view/fragment/fragmentVaccinationFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    