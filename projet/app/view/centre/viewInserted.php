
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
        echo ("<h3>Le centre a été ajouté </h3>");
        echo("<ul>");
        echo ("<li>id = " . $results . "</li>");
        echo ("<li>label = " . $_GET['label'] . "</li>");
        echo ("<li>adresse = " . $_GET['adresse'] . "</li>");
        echo("</ul>");
    } else {
        echo ("<h3>Problème d'insertion du Centre</h3>");
        echo ("id = " . $results);
    }

    echo("</div>");

    include $root . '/app/view/fragment/fragmentVaccinationFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    