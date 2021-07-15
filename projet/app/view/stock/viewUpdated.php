
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
        echo ("<h3>Le stock centre_id = ". $_GET['id_centre'] ." a été mis à jour : </h3>");
        echo("<ul>");
        $i = 1;
        while (isset($_GET[$i])){
            if ($_GET[$i] != '0'){
            echo ("<li>vaccin_id = " . $i . "; doses quantité_ajoutée= " . $_GET[$i] . "</li>");
            }
            $i++;
        }
        echo("</ul>");

    echo("</div>");

    include $root . '/app/view/fragment/fragmentVaccinationFooter.html';
    ?>
    <!-- ----- fin viewInserted -->


<?php
