
<!-- ----- début viewAll -->
<?php

require($root . '/app/view/fragment/fragmentVaccinationHeader.html');
?>

<body>
<div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentVaccinationMenu.html';
    include $root . '/app/view/fragment/fragmentVaccinationJumbotron.html';
    ?>
    <table class = "table table-striped table-bordered">
        <thead>
        <tr>
            <th scope = "col">Centre</th>
            <th scope = "col">Vaccin</th>
            <th scope = "col">Quantité</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($results as $element) {
            printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $element["centre_label"],
                $element["vaccin_label"], $element["quantite"]);
        }
        ?>
        </tbody>
    </table>
</div>
<?php include $root . '/app/view/fragment/fragmentVaccinationFooter.html'; ?>

<!-- ----- fin viewAll -->
  
  
  